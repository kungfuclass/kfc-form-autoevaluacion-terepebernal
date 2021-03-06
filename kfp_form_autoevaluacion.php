<?php
/**
 * Plugin Name:  KFP Formulario Autoevaluación
 * Description:  Formulario para valorar el nivel de partida de los usuarios en distintos temas.
 * Utiliza el shortcode [kfp_aspirante_form] para que el formulario
 * aparezca en la página o el post que desees.
 * Version:      0.1.1
 * Author:       Pequeño Saltamontes
 * Author URI:   https://kungfupress.com/
 * PHP Version:  5.6
 *
 * @category Form
 * @package  KFP
 * @author   Pequeño Saltamontes <pequesalta@gmail.com>
 * @license  GPLv3 http://www.gnu.org/licenses/gpl-3.0.txt
 * @link     https://kungfupress.com
 */

 // Activación del plugin
 // Cuando el plugin se active se crea la tabla para recoger los datos si no existe
 register_activation_hook( __FILE__, 'Kfp_Aspirante_init' );

 /**
  * Crea la tabla para recoger los datos del formulario
  *
  * @return void
  */
  function Kfp_Aspirante_init()
  {
        global $wpdb;  // Este objeto global permite acceder a la base de datos de WP
        // Crea la tabla solo si no existe
        // Utiliza el mismo prefijo del resto de tablas
        $tabla_aspirantes = $wpdb->prefix . 'aspirante';
        // Utiliza el mismo tipo de orden de la base de datos
        $charset_collate = $wpdb->get_charset_collate();
        // Prepara la consulta
        $query = "CREATE TABLE IF NOT EXISTS $tabla_aspirantes (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nombre varchar(40) NOT NULL,
            correo varchar(100) NOT NULL,
            nivel_html smallint(4) NOT NULL,
            nivel_css smallint(4) NOT NULL,
            nivel_js smallint(4) NOT NULL,
            nivel_php smallint(4) NOT NULL,
            nivel_wp smallint(4) NOT NULL,
            aceptacion smallint(4) NOT NULL,
            created_at datetime NOT NULL,
            UNIQUE (id)
        ) $charset_collate;";
        // La función dbDelta permite crear tablas de manera segura,
        // se define en el fichero upgrade.php que se incluye a continuación
        include_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $query );  // Lanza la consulta para crear la tabla de manera segura
  }

 // Creación del shortcode
 // Define el shortcode y lo asocia a una función
add_shortcode( 'kfp_aspirante_form', 'Kfp_Aspirante_form' );

/**
 *  Define la función que ejecutará el shortcode.
 *  Comprueba si se han enviado los datos desde el formulario y pinta *  el formulario.
 *
 *   @return string
 **/
function Kfp_Aspirante_form()
{
    global $wpdb;   // Este objeto global permite acceder a la base de datos de  WP
    // Si viene del formulario grba en la base de datos
    // Cuidado con el último igual de la condición del if que es doble
    if ($_POST['nombre'] != ''
    AND is_email($_POST['correo'])
    AND $_POST['nivel_html'] != ''
    AND $_POST['nivel_css'] != ''
    AND $_POST['nivel_js'] != ''
    AND $_POST['nivel_php'] != ''
    AND $_POST['nivel_wp'] != ''
    AND $_POST['aceptacion'] == '1'
    AND wp_verify_nonce( $_POST['aspirante_nonce'], 'graba_aspirante')
    ){
      $tabla_aspirantes = $wpdb->prefix . 'aspirante';
      $nombre = sanitize_text_field($_POST['nombre']);
      $correo = $_POST['correo'];
      $nivel_html = (int) $_POST['nivel_html'];
      $nivel_css = (int) $_POST['nivel_css'];
      $nivel_js = (int) $_POST['nivel_js'];
      $nivel_php = (int) $_POST['nivel_php'];
      $nivel_wp = (int) $_POST['nivel_wp'];
      $aceptacion = (int) $_POST['aceptacion'];
      $created_at = date('Y-m-d H:i:s');
      $wpdb->insert(
                $tabla_aspirantes,
                array(
                    'nombre' => $nombre,
                    'correo' => $correo,
                    'nivel_html' => $nivel_html,
                    'nivel_css' => $nivel_css,
                    'nivel_js' => $nivel_js,
                    'nivel_php' => $nivel_php,
                    'nivel_wp' => $nivel_wp,
                    'aceptacion' => $aceptacion,
                    'created_at' => $created_at,
                )
          );
          echo "<p class='exito'><b>Tus datos han sido registrados</b>. Gracias por tu interés. En breve contactaré contigo.</p>";

    }
    // Carga esta hoja de estilo para poner más bonito el formulario
    wp_enqueue_style( 'css_aspirante', plugins_url('style.css', __FILE__));

    // Esta función de PHP activa el almacenamiento en búfer de salida (output buffer).
    // Cuando termine el formulario lo imprime con la función ob_get_clean
    ob_start();
    ?>
    <form action="<?php get_the_permalink(); ?>" method="post" id="form_aspirante" class="cuestionario">
    <?php wp_nonce_field('graba_aspirante', 'aspirante_nonce'); ?>
    <div class="form-input">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>
    <div class="form-input">
        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" required>
    </div>
    <div class="form-input">
        <label for="nivel_html">¿Cuál es tu nivel de HTML?</label><br />
        <input type="radio" name="nivel_html" value="1" required>Nada<br />
        <input type="radio" name="nivel_html" value="2" required>Estoy aprendiendo<br />
        <input type="radio" name="nivel_html" value="3" required>Tengo experiencia<br />
        <input type="radio" name="nivel_html" value="4" required>Lo domino al dedillo
    </div>
    <div class="form-input">
        <label for="nivel_css">¿Cuál es tu nivel de CSS?</label><br />
        <input type="radio" name="nivel_css" value="1" required>Nada<br />
        <input type="radio" name="nivel_css" value="2" required>Estoy aprendiendo<br />
        <input type="radio" name="nivel_css" value="3" required>Tengo experiencia<br />
        <input type="radio" name="nivel_css" value="4" required>Lo domino al dedillo
    </div>
    <div class="form-input">
        <label for="nivel_js">¿Cuál es tu nivel de JavaScript?</label><br />
        <input type="radio" name="nivel_js" value="1" required>Nada<br />
        <input type="radio" name="nivel_js" value="2" required>Estoy aprendiendo<br />
        <input type="radio" name="nivel_js" value="3" required>Tengo experiencia<br />
        <input type="radio" name="nivel_js" value="4" required>Lo domino al dedillo
    </div>
    <div class="form-input">
        <label for="nivel_php">¿Cuál es tu nivel de PHP?</label><br />
        <input type="radio" name="nivel_php" value="1" required>Nada<br />
        <input type="radio" name="nivel_php" value="2" required>Estoy aprendiendo<br />
        <input type="radio" name="nivel_php" value="3" required>Tengo experiencia<br />
        <input type="radio" name="nivel_php" value="4" required>Lo domino al dedillo
    </div>
    <div class="form-input">
        <label for="nivel_wp">¿Cuál es tu nivel de WordPress?</label><br />
        <input type="radio" name="nivel_wp" value="1" required>Nada<br />
        <input type="radio" name="nivel_wp" value="2" required>Estoy aprendiendo<br />
        <input type="radio" name="nivel_wp" value="3" required>Tengo experiencia<br />
        <input type="radio" name="nivel_wp" value="4" required>Lo domino al dedillo
    </div>
    <div class="form-input">
        <label for="aceptacion">La información facilitada se tratará con respeto y admiración.</label><br />
        <input type="checkbox" id="aceptacion" name="aceptacion" value="1" required> Entiendo y acepto las codiciones</div>
    </div>
    <div class="form-input">
        <input type="submit" value="Enviar">
    </div>
    </form>
    <?php
    // Devuelve el contenido del buffer de salida
    return ob_get_clean();
}

 // Creación del menú de administración
 // El hook "admin_menu" permite agregar un nuevo item al menú de administración
 add_action("admin_menu", "Kfp_Aspirante_menu");

 /**
  * Agrega el menú del plugin al panel de administración
  *
  * @return void
  */
  function Kfp_Aspirante_menu()
  {
      add_menu_page(
          'Formulario de Aspirantes', 'Aspirantes', 'manage_options', 'kfp_aspirante_menu', 'Kfp_Aspirante_admin', 'dashicons-feedback', 75
      );
  }

 // Creación de la tabla de resultados
 /**
  * Crea el contenido del panel de administración para el plugin
  *
  * @return void
  */
  function Kfp_Aspirante_admin()
  {
      global $wpdb;
      $tabla_aspirantes = $wpdb->prefix . 'aspirante';
      echo '<div class="wrap"><h1>Lista de aspirantes</h1>';
      echo '<table class="wp-list-table widefat fixed striped">';
      echo '<thead><tr><th width="30%">Nombre</th><th width="20%">Correo</th><th>HTML</th><th>CSS</th><th>JS</th><th>PHP</th><th>WP</th><th>Total</th></tr></thead>';
      echo '<tbody id="the-list">';
      $aspirantes = $wpdb->get_results("SELECT * FROM $tabla_aspirantes");
      foreach($aspirantes as $aspirante){
          $nombre = esc_textarea($aspirante->nombre);
          $correo = esc_textarea($aspirante->correo);
          $motivacion = esc_textarea( $aspirante->motivacion);
          $nivel_html = (int) $aspirante->nivel_html;
          $nivel_css = (int) $aspirante->nivel_css;
          $nivel_js = (int) $aspirante->nivel_js;
          $nivel_php = (int) $aspirante->nivel_php;
          $nivel_wp = (int) $aspirante->nivel_wp;
          $total = $nivel_html + $nivel_css + $nivel_js + $nivel_php + $nivel_wp;
          echo "<tr><td><a href='#' title='$motivacion'> $nombre </a></td>
                <td>$correo</td><td>$nivel_html</td><td>$nivel_css</td>
                <td>$nivel_js</td><td>$nivel_php</td><td>$nivel_wp</td>
                <td>$total</td></tr>";
      }
      echo '</tbody></table></div>';
  }

