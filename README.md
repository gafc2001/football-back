## Dev Challenge - Gustavo Farfan

La empresa Dev Challenge desarrolla soluciones tecnológicas que optimizan procesos en diferentes industrias. Actualmente, busca mejorar su plataforma mediante la adopción de buenas prácticas de arquitectura, diseño, y desarrollo de software. La prueba técnica está diseñada para evaluar tus habilidades prácticas y conocimientos en un entorno similar al que enfrentarás como parte del equipo.

## Despliegue
- Front: https://football.devgustavo.com
  - Correo: prueba@prueba.com
  - Clave: password
- Back: https://football-back.devgustavo.com

##### Solución
Para la sincronización de jugadores, en cada consulta guardo la respuesta en un archivo json del equipo y de ahi obtengo luego todos los jugadores agrupados, esto podriamos replicarlo para cada una de las consultas para ya no depender del servicio externo. Para este tipo de casos utilize una arquitectura hexoganal, que viene perfecto para esto tipo de problemas donde necesitamos consumir un recurso de un tercero y esto no deba afectar la logica de negocio de nuestra app.


##### Requerimientos

- Laravel
- PHP 8.2.*
- Cualquier DB
