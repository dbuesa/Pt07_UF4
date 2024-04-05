# PRÀCTICA 07 - MIGRACIÓ PHP NATIU A LARAVEL
### David Buesa Lorente

## Continguts realitzats

- [x] Part bàsica
- [x] Recaptcha
- [x] Recuperació de contrasenya
- [x] Autenticació social
- [x] Modificació de perfil


- La pàgina està traduïda al català gràcies a un paquet creat per la comunitat (amb el seu respectiu suport): laravel-lang/common.

## Part bàsica

- Al carregar la pàgina es mostren tots els articles que trobem a la base de dades, independenment de qui sigui l'usuari que els ha creat. 
- L'usuari pot elegir la paginació dels articles (Paginator).
- Quan l'usuari inicia sessió, pot veure els articles que ha creat ell mateix, així com editar-los o eliminar-los. També pot crear nous articles.
- La contraseña de l'usuari es guarda encriptada a la base de dades.
- L'usuari pot recuperar la contrasenya a través de l'enviament d'un correu electrònic amb un enllaç per a la seva recuperació.
- Al registre, es valida que l'usuari no estigui registrat prèviament i que les contrasenyes siguin iguals.
