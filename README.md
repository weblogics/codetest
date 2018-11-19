# Setup

Please pull down this repository and then ```cd``` into the directory.

### Step One

You will need to run ```composer install```

### Step Two

You will need to make a copy of the ```.env.example``` file by running ```cp .env.example .env```

Please check this has copied the file and you should now have a ```.env``` file

### Step Three

You will need to open the ```.env``` file and enter you db credentials replacing the placeholders below:

```
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

### Step Four

Hop back to the terminal window and generate the application key by running: ```php artisan key:generate```

### Step Five

Migrate the database by running:

```php artisan migrate```

Seed the database with the test data provided:

```php artisan db:seed```

### Running the application

You can run this in one of two ways, if you have a local server running you can point the path to:

```/public```

Or I'd recommend using the built in Laravel server which can be ran by issuing the following command:

```php artisan serve```

#### Approach

Firstly I read through the requirements, not all made sense and I've completed 95% of functionality requested.

Secondly I created the database migrations to enable anyone working on this to not rely on the passing around of sql import files.

Thirdly I created database seeders in order to get my database up to speed with the requested data, this also ensures I can quickly run fresh installs of the migrations and seed the db again as well as everyone in the team having the same data.

Finally I used best practices and utilised the power of the framework in order to adhere to the specification required.

For the front end I used Bootstrap 4 in order to create a good User Experience (although not required).

#### Making the choices I did

I choose to use Laravel as its a framework i'm familiar with and also provides fast, reliable application development. The documentation is full bodied and if your using PHP then this is the best framework for web application development as its built for this.

#### Time spent

I spent 4.5 hours on this project (including UI)

#### If I had longer

If I had longer I would've:

1. Created a package subscription trait to manage and check subscriptions for team packages
2) Created tests
3) Create repositories for handling complex queries and joins as this application could grow and we'd need to re-use queries again and again.

From a feature side:

1) Added the ability to track notices, currently you can give you notice in constantly, we'd need to add a flag in the db to track notices handed in and when.
2) Added functionality to CRUD teams
3) Added functionality to CRUD packages
4) Added pagination to listing pages since this could get quite cumbersome
5) Added a search to listing pages in order to quickly locate teams or packages


