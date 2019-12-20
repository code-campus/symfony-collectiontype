# Collection Type

1. Installation de symfony
    ```bash
    composer create-project symfony/skeleton <project> "4.4.*"
    cd <project>

    composer require symfony/maker-bundle --dev
    composer require symfony/orm-pack
    composer require annotations
    composer require form
    composer require twig-bundle
    composer require encore

    npm install bootstrap
    npm install jquery
    npm install popper.js

    yarn install
    ```

2. Config de la BDD
    ```yaml
    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    ```


3. Création des entités 'Books', 'Authors', 'BooksPrices'

    1. Books
        - title (string 120)
        - description (text)
        - cover (string 255)
        - authors (ManyToOne > Authors)
        - prices (ManyToOne > BooksPrices)
    
    2. Authors
        - firstname (string 80)
        - lastname (string 80)
        - nickname (string 80)

    3. BooksPrices
        - quantity (integer)
        - price (decimal 5,2)


4. Création de la BDD + Migrations

5. Routes + Controller
    - Homepage
    - Books
    - Book create
    - Book read
    - Book update
    - Book delete
    - Authors
    - Author create
    - Author read
    - Author update
    - Author delete

6. Formulaires
    - BookType
    - AuthorType
    - PriceType

7. Vue TWIG