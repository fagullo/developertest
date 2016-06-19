This project is build under Laravel 5.2 for running it please follow the instructions:

The installation of Homestead is required, you can find the instructions in 'https://laravel.com/docs/5.2/homestead'

1. Download the project from github 'https://github.com/fagullo/developertest'.
2. In the file ~/.homestead/Homestead.yaml add the following lines:

folders:
    - map: ~/projects/laravel
      to: /home/vagrant/projects

sites:
    - map: www.developertest.dev
      to: /home/vagrant/projects/developertest/public

databases:
    - developertest

The folders/map atribute should be the path where the project has been cloned.

3. Go to the project base and create the database by running 'php artisan migrate'.
4. Go to ~/.homestead/Homestead and run the command vagrant up
5. If everything goes well the application should be accessible by visiting the URL 'www.developertest.dev' in your favourite browser.

#############################

A command has been created to execute the crawler service. For obtaining the data from the web just go to the project home folder and run 'php artisan apply-crawler'. Once the command has been finished the database will be populated and the application will be ready for working.


