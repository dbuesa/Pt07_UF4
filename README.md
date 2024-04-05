# PRÀCTICA 07 - MIGRACIÓ PHP NATIU A LARAVEL
### David Buesa Lorente

 **IMPORTANT!** 
L'aplicatiu funciona per a una terminació en .com (s'ha de canviar a través de laragon) ja que sino l'oauth no funcionarà degut a les polítiques de seguretat de Google.

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


## Recaptcha
- Si l'usuari introdueix malament la contrasenya tres vegades, apareixerà un recaptcha per a validar que no és un bot.
- Es te en compte que si l'usuari s'equivoca tres vegades i surt el captcha, si l'usuari surt del login i torna a entrar, el captcha seguirà sortint.

## Recuperació de contrasenya
- L'usuari pot recuperar la contrasenya a través de l'enviament d'un correu electrònic amb un enllaç per a la seva recuperació. Aquest procés es fa mitjançant la vista del login

## Autenticació social
- L'usuari pot iniciar sessió a través de Google o Github.
- Només s'implementa OAuth2 ja que HybidAuth està deprecated.

## Modificació de perfil
- L'usuari pot modificar el seu perfil, canviant la seva contrasenya o el correu electrònic.
- Aquest panell es troba una vegada inicies sessió a la pàgina principal, a la part superior dreta.

