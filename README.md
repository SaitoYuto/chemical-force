# Chemical Force

<p align="center">
  <img src="./README/images/logo.svg" width="150" height="150">
</p>

Chemical Force is a fictional company, dealing with chemical product.
The application is designed for the employees and offer four main pages: Login, Home, Deal, Area.

- Login
  - Allow users to enter home with user identification and password.
- Home
  - Made of side bar and main pane where offer todo memo and the company information.
- Deal
  - A employee deal with multiple customers and products. Here display those data.
- Area
  - A employee can work multiple area. Here display those data.

## FrontEnd

Check `frontend` directory.

## BackEnd

Check `backend` directory.

## Integration on localhost

- Remember that you require MySQL for database.
- Firstly, setup database and run Laravel built-in server

1. `cd .\backend\`
1. `php artisan migrate`
1. `php artisan db:seed`
1. `php artisan serve`

- Next, run Vite built-in server.
- Here, run `npm run preview` for integration.
  - Check `/frontend/vite.config.mts`, where sets for API endpoint.

1. `cd .\frontend\`
1. `npm run build`
1. `npm run preview`
