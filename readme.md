# REST Fund a Day

## Built on Laravel 5.2

Download and install Laravel, as well as Laravel Homestead to get your local environment up and running.

Make sure to follow all of the installation and configuration instructions, including setting up your own `.env` file.  You can copy `.env.example` to get a good start.

Run `npm install` to install the needed packages for Laravel Elixir (gulp)

### Create a local DB with Sequel Pro (Mac)

If you're using the default .env file - your database creds are:

Name: *rest_fundaday-LOCAL* (or equivalent)
Host: *127.0.0.1*
Username: *homestead*
Password: *secret*
Port: *33060*

Leave database field open for now - then connect and click *Add Database...* in the dropdown of the top right - name your db: `restfad`

Now that you've created your database, you can enter `restfad` on the credentials screen and save it as a favorite.

### Daily Usage

cd into your Homestead folder - ideallly: 
`cd ~/Homestead`

run:
`vagrant up`

This will get your virtual machine running.

Once it's running SSH into it using:
`vagrant ssh`

After you've SSH'd in, to get the latest db migrations, run:
`php artisan migrate`

Then you can run:
`composer dumpautoload`

To get the latest autoloaded classes.

--

Open a new Terminal tab and cd into your rest_fundaday directory.  Then run:
`gulp watch` 

to have Elixir (gulp) watch for changes to your asset files

