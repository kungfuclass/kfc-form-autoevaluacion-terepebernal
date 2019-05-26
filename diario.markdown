# 1 de Mayo de 2019
- He instalado un WordPress nuevo en mi entorno de desarrollo y he creado un theme child del Twenty Twelve.
- He clonado el repositorio del plugin de autoevaluación en local, dentro de la carpeta de plugins del theme.
- He hecho los cambios siguiendo el post en el archivo `kfp_form_autoevaluacion.php` para definir el shortcode. He hecho un commit de ello en local y he actualizado el repositorio remoto.
- He creado el archivo `style.css` para dar un poco de estilo al formulario. Todo funciona bien, otro commit y actualización del repositorio remoto.

# 2 de Mayo de 2019
- Quería aprender algo de Markdown, así que he aprovechado esto del diario y he visto un vídeo que hay en youtube de 5 min. para aprender lo básico y poder hacer este archivo con Markdown. 
- He copiado todo el código del post del apartado *"crear la tabla para recoger los datos"*. Sigue funcionando bien y no me da ningún error, pero no me crea la tabla, no sé por qué, he desactivado el plugin y lo he vuelto a activar. **¡¡SOS!!**. Creo commit y lo actualizo en repositorio remoto.

# 3 de Mayo de 2019
- Corrijo el error encontrado por **tonioruiz** que impedía que se creara la tabla del plugin. Creo commit y lo actualizo en repositorio remoto. Cierro incidencia (issue).

# 4 de Mayo de 2019
- Código para grabar los datos. Todo funciona genial. Creo commit.
- Añadir campo nonce para evitar ataque CSRF. Campo oculto creado con una función de WordPress, puedo visualizarlo al inspeccionar. He corregido también el *id del formulario*, que lo tenía mal escrito. Otro commit y actualizo el repositorio remoto.

# 10 de Mayo de 2019
- Busco en internet una función auxiliar para obtener la **ip del usuario** y la incluyo en el fichero `kfp_form_autoevaluacion.php`. También incluyo el campo `ip` en las funciones `Kfp_Aspirante_init()` y `Kfp_Aspirante_form()` para crearlo en la tabla y que se pueda grabar la ip del usuario en él.
- Elimino la `tabla wp_aspirante` y desactivo-activo el plugin para que se vuelva a crear la tabla con el campo `ip`. Parece que todo funciona bien. Nuevo commit y actualizo repositorio remoto.
- Código de creación de **item en menú de administración y tabla de resultados**. Funciona bien, aunque la tabla de resultados incluye columnas para niveles de PHP y WP, para los que no se ha creado código. Me lo apunto para completarlo más adelante. Commit y actualización repositorio remoto.

# 11 de Mayo de 2019
- He estado viendo en el vídeo de Git la parte de las ramas, aprovechando que quiero añadirle al plugin lo que le falta al código para los niveles de PHP y WordPress, voy a hacer una rama para ello. No sé si tiene mucho sentido, es solo para probar lo de las ramas. 
![Resultado de la tabla:](resultado-tabla-plugin.jpg).

# 25 de Mayo de 2019
- Voy a ver si soy capaz de llevar a cabo las propuestas de mejora para el plugin que se mencionan en el ejercicio. La primera es **enviar un correo al administrador del sitio cuando se envíe un formulario**. He estado buscando información para ver si hay alguna función de WordPress con la que obtener el email del administrador, quizás exista pero yo no la he encontrado.
- He conseguido crearla, la he llamado `Kfp_get_email_admin()`. Hace una consulta en la base de datos, mediante la cual obtiene el **email del administrador**, que (si no me equivoco) se encuentra en la tabla `wp_options`.

# 26 de Mayo de 2019
- Ayer me di cuenta que estaba en una rama en la que no quería haber hecho el commit, así que esta mañana me he puesto a buscar información para tratar de arreglarlo.
- Para evitar destrozos grandes lo primero que he hecho antes de hacer ningún cambio ha sido hacerme una copia del directorio completo.
- Después he hecho un `git revert HEAD`, con ello he podido quitar el commit del repositorio remoto. A continuación `git resert --soft HEAD-1`, lo que ha hecho que el commit se borrara de local pero sin modificar los cambios.
- Hasta ahí todo bien. El problema ha venido cuando he creado otra rama llamada **enviar_email_administrador** y he querido pasar ahí los cambios; menos mal que era poco código y había hecho una copia antes. He aprendido en parte el comando `git stash`, que parece ser que es para guardar cambios temporalmente, pero al final ha habido una serie de conflictos y se me ha esfumado el código por algún sitio, creo que ha sido al hacer `git stash pop`. 
- Como lo tenía guardado, he conseguido rehacerlo, y tengo mi nueva rama con los cambios, aunque al final haya sido a lo bruto.
