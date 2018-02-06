# Import the database object (db) from the main application module
from app import client
from app import db, db_usuarios, db_estados, db_chats

#Borramos toda la base de datos al principio
client.drop_database('redparaati')

usuarios_prueba = [
	{
      "id" : 1,
      "password" : "1234",
      "email" : "miguel@gmail.com",
      "nombre" : "Miguel Angel",
      "descripcion" : "todo ta' bien",
      "genero" : "masculino",
      "ci" : "1000123",
      "fecha_nacimiento" : "1997/12/01",
      "ruta_foto_perfil" : "../../static/images/1.png",
      "relacion": 
      [
        {
          "id" : "1_1",
          "id_con": 2, 
          "tipo_relacion" : "Mejores Amigos",
          "fecha_inicio_relacion" : "2017/12/01",
          "privacidad" : "",
          "estado" : "Aceptado"
        },
        {
          "id" : "1_2",
          "id_con": 3, 
          "tipo_relacion" : "Hermanos",
          "fecha_inicio_relacion" : "2017/12/02",
          "privacidad" : "",
          "estado" : "Aceptado"
        }
      ],
      "estados" : [100,103],
      "voto_estado" : [801,802],
      "comentarios" : [1001,1005]
    },
    {
      "id" : 2,
      "password" : "1234",
      "email" : "2@gmail.com",
      "nombre" : "Feliz",
      "descripcion" : "todo ta' bien",
      "genero" : "masculino",
      "ci" : "1000123",
      "fecha_nacimiento" : "1997/12/01",
      "ruta_foto_perfil" : "../../static/images/2.png",
      "relacion": 
      [
        {
          "id" : "2_1",
          "id_con": 1, 
          "tipo_relacion" : "Mejores Amigos",
          "fecha_inicio_relacion" : "2017/12/01",
          "privacidad" : "",
          "estado" : "Aceptado"
        },
        {
          "id" : "2_2",
          "id_con": 3, 
          "tipo_relacion" : "Amgios",
          "fecha_inicio_relacion" : "2017/12/02",
          "privacidad" : "",
          "estado" : "Aceptado"
        }
      ],
      "estados" : [102,104],
      "voto_estado" : [],
      "comentarios" : [1002,1006]
    },
    {
      "id" : 3,
      "password" : "1234",
      "email" : "3@gmail.com",
      "nombre" : "Corazón",
      "descripcion" : "todo ta' bien",
      "genero" : "masculino",
      "ci" : "1000123",
      "fecha_nacimiento" : "1997/12/01",
      "ruta_foto_perfil" : "../../static/images/3.png",
      "relacion": 
      [
        {
          "id" : "3_1",
          "id_con": 2, 
          "tipo_relacion" : "Amigos",
          "fecha_inicio_relacion" : "2017/12/01",
          "privacidad" : "",
          "estado" : "Aceptado"
        },
        {
          "id" : "3_2",
          "id_con": 1, 
          "tipo_relacion" : "Hermanos",
          "fecha_inicio_relacion" : "2017/12/02",
          "privacidad" : "",
          "estado" : "Aceptado"
        }
      ],
      "estados" : [105],
      "voto_estado" : [],
      "comentarios" : [1003, 1007]
    }
]



estados = [
    {
      "id" : 100,
      "fecha_creacion" : "2017/12/02",
      "fecha_modificacion" : "",
      "id_usuario" : 1,
      "texto" : "Esto es un estado...",
      "multimedia_url" : "../../static/images/probando (1).jpg",
      "tipo_multimedia" : "jpg",
      "cant_like" : 1,
      "cant_dislike" : 0,
      "cant_visualizaciones": 1,
      "privacidad": "Público",
      "voto_estado" : [
        {"id" : 801, "id_usuario": 1,"like" : 1, "dislike" : 0, "visualizo" : 1, "reportar_contenido" : 0}
      ],
      "comentarios" : 
      [
        {
          "id" : 1001,
          "id_comentario_principal": -1,
          "fecha_creacion": "14/08/17 22:16",
          "id_usuario" : 1,
          "cant_like" : 0,
          "cant_dislike" : 0,
          "respuestas" : 1,
          "texto": "Lorem ipsum dolor sit amet"
        },
        {
          "id" : 1002,
          "id_comentario_principal": 1001,
          "fecha_creacion": "14/08/17 22:17",
          "id_usuario" : 2,
          "cant_like" : 0,
          "cant_dislike" : 0,
          "respuestas" : 0,
          "texto": "consectetur adipiscing elit."
        },
        {
          "id" : 1003,
          "id_comentario_principal": 1001,
          "fecha_creacion": "14/08/17 22:16",
          "id_usuario" : 3,
          "cant_like" : 0,
          "cant_dislike" : 0,
          "respuestas" : 0,
          "texto": "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
        }
      ]
    },
    {
      "id" : 102,
      "fecha_creacion" : "2017/12/02",
      "fecha_modificacion" : "",
      "id_usuario" : 2,
      "texto" : "Esto es un estado de 200...",
      "multimedia_url" : "../../static/images/probando (2).jpg",
      "tipo_multimedia" : "jpg",
      "cant_like" : 1,
      "cant_dislike" : 0,
      "cant_visualizaciones": 1,
      "privacidad": "Público",
      "voto_estado" : [
        {"id" : 802, "id_usuario": 199,"like" : 1, "dislike" : 0, "visualizo" : 1, "reportar_contenido" : 0}
      ],
      "comentarios" : 
      [
        {
          "id" : 1001,
          "id_comentario_principal": -1,
          "fecha_creacion": "14/08/17 22:16",
          "id_usuario" : 1,
          "cant_like" : 0,
          "cant_dislike" : 0,
          "respuestas" : 0,
          "texto": "Lorem ipsum dolor sit amet"
        }
      ]
    }
]

db_usuarios.insert_many(usuarios_prueba)
db_estados.insert_many(estados)