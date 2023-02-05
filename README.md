# Login example with AJAX and PHP
this is ajax login example using pure js and php with postgresql database.
### Features
- PDO Postgres pre-prepared queries.
- Password Hashing.
- Js ajax with await fetch.

### Requires
- PHP 7.4 minimun (tested with 8.0).
- Postgresql (tested with 14).

## Usage 
1. Copy contents to working web directory.
2. Create a database.
3. Add database name in file ```Classes/Database/Connection.php``` <br>
   ![image](https://user-images.githubusercontent.com/101847989/216799286-47441f57-c85f-45f8-a58f-ff9538722c0c.png)

4. Create a table, follow example ```setup/table.sql``` into Postgresql.
  - if you don't create a table as shown in the example <br>
    you will have to change the table name in the following document: ```Classes/Login/Login.php``` <br>
  ![image](https://user-images.githubusercontent.com/101847989/216799520-4733b427-ccc1-4c64-9993-81e3e4bd9bcf.png)

5. Login screen: <br>
![image](https://user-images.githubusercontent.com/101847989/216797655-10d68486-f778-4c51-88a7-4038d132aec5.png)

