# 10 de Mayo de 2019
- Busco en internet una función auxiliar para obtener la **ip del usuario** y la incluyo en el fichero `kfp_form_autoevaluacion.php`. También incluyo el campo `ip` en las funciones `Kfp_Aspirante_init()` y `Kfp_Aspirante_form()` para crearlo en la tabla y que se pueda grabar la ip del usuario en él.
- Elimino la `tabla wp_aspirante` y desactivo-activo el plugin para que se vuelva a crear la tabla con el campo `ip`. Parece que todo funciona bien. Nuevo commit y actualizo repositorio remoto.
- Código de creación de **item en menú de administración y tabla de resultados**. Funciona bien, aunque la tabla de resultados incluye columnas para niveles de PHP y WP, para los que no se ha creado código. Me lo apunto para completarlo más adelante. Commit y actualización repositorio remoto.

# 4 de Mayo de 2019
- Código para grabar los datos. Todo funciona genial. Creo commit.
- Añadir campo nonce para evitar ataque CSRF. Campo oculto creado con una función de WordPress, puedo visualizarlo al inspeccionar. He corregido también el *id del formulario*, que lo tenía mal escrito. Otro commit y actualizo el repositorio remoto.

# 3 de Mayo de 2019
- Corrijo el error encontrado por **tonioruiz** que impedía que se creara la tabla del plugin. Creo commit y lo actualizo en repositorio remoto. Cierro incidencia (issue).

# 2 de Mayo de 2019
- Quería aprender algo de Markdown, así que he aprovechado esto del diario y he visto un vídeo que hay en youtube de 5 min. para aprender lo básico y poder hacer este archivo con Markdown. 
- He copiado todo el código del post del apartado *"crear la tabla para recoger los datos"*. Sigue funcionando bien y no me da ningún error, pero no me crea la tabla, no sé por qué, he desactivado el plugin y lo he vuelto a activar. **¡¡SOS!!**. Creo commit y lo actualizo en repositorio remoto.

# 1 de Mayo de 2019
- He instalado un WordPress nuevo en mi entorno de desarrollo y he creado un theme child del Twenty Twelve.
- He clonado el repositorio del plugin de autoevaluación en local, dentro de la carpeta de plugins del theme.
- He hecho los cambios siguiendo el post en el archivo `kfp_form_autoevaluacion.php` para definir el shortcode. He hecho un commit de ello en local y he actualizado el repositorio remoto.
- He creado el archivo `style.css` para dar un poco de estilo al formulario. Todo funciona bien, otro commit y actualización del repositorio remoto.