# 7 de Junio de 2019
- Revierto el commit relacionado con la IP del aspirante.
- Fusiono la rama **incluir_niveles_php_y_wp** con la rama master.

# 1 de Junio de 2019
- Este commit es solo para cambiar el orden de las fechas en el diario y que se vean las más actuales antes.
- Decir que desde el 11 de mayo que empecé con lo de las ramas he aprendido a crearlas, borrarlas y moverme de unas a otras. Lo que todavía no he hecho es fusionarlas.

# 28 de Mayo de 2019
- Se me ha propuesto el reto de añadir la IP de los aspirantes actualizando la base de datos con el plugin, y no como lo había hecho yo, a mano. Comienzo hoy con ello.
- He visto que en algunos plugins para anotar los cambios crean un archivo llamado `changelog.txt` para explicar los cambios que hay de una versión a otra, y otros lo hacen en el mismo `readme`. Yo, como no sé muy bien todavía que estoy haciendo, de momento lo voy a escribir aquí.
- También he visto que lo escriben todo de abajo a arriba, para que lo más actual se vea arriba y no tenga uno que estar bajando a leer lo nuevo, me parece muy lógico, así que también voy a cambiar este diario y voy a moverlo todo para que se vea así, la fecha más actual primero.
- He quitado todo el código relacionado con la IP para poder aprovecharlo y lo he guardado en un archivo que no saldrá en el commit. También he borrado de la tabla `wp_aspirante` el campo `ip`, he agregado un nuevo aspirante a través del formulario y he comprobado que todo funciona bien.
- También he hecho lo mismo con la última función auxiliar `Kfp_get_email_admin()` para si consigo hacer lo de la actualización del plugin, hacer que las propuestas de mejora formen parte también de otra actualización. Supongo que todo esto de quitar código de aquí y ponerlo allá y que al final me quede como yo quiero podría haberlo hecho con git, pero como no lo sé, de momento mejor así. De esta manera también me quedará todo documentado y sabré por que he hecho esto y aquello.
- Dejo la rama **enviar_email_administrador** creada el día 26, para volver a usarla cuando vuelva a empezar con lo del email más adelante. Actualizaré la rama tal y como lo tengo todo ahora mismo para que quede documentado con este diario y crearé una nueva rama llamada **version_0.1.2 del plugin** para seguir desde ahí con la actualización. No sé si lo estoy haciendo correctamente, pero es la única forma que de momento se me ocurre para no perderme.

# 11 de Mayo de 2019
- He estado viendo en el vídeo de Git la parte de las ramas, aprovechando que quiero añadirle al plugin lo que le falta al código para los niveles de PHP y WordPress, voy a hacer una rama para ello. No sé si tiene mucho sentido, es solo para probar lo de las ramas.
![Resultado de la tabla:](resultado-tabla-plugin.jpg).

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
