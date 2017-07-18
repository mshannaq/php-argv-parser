# php-argv-parser

php-argv-parser.php : phpParseArgv function :  PHP command line argv (argurments) parser function.
Author: Mohammed AlShannaq (mshannaq), http://ms.per.jo
License: Apache License 2.0

This function uses some modified codes of php-argv which was written by samejack , https://github.com/samejack/php-argv under Apache License 2.0 License.

I Create the tool as function because I prefer to use it in any one file project, so copy the function(s) below and then append it to your php file if you need any argv parser. 
for any related questions please contact me http://ms.per.jo/page/contact

## Usage
### Example 1:
~~~~
$ ./php-argv-parser.php -host=127.0.01 -username=User -password=PassWord --ignoresomething
~~~~
The function will split the argv parameters into array as the following
````
Array
(
    [host] => 127.0.01
    [username] => User
    [password] => PassWord
    [ignoresomething] => 1
)
````

### Example 2:
~~~~
$ /usr/bin/php php-argv-parser.php --host=127.0.01 --username=User --password=PassWord -ignoresomething
~~~~

The function will split the argv parameters into array as the following (You can use - or -- as the same)

````
Array
(
    [host] => 127.0.01
    [username] => User
    [password] => PassWord
    [ignoresomething] => 1
)
````

### Example 3: using quotation or doubkle quotation
You can use quotation or double quotation if some parameters has space in its value as the following:
~~~~
$ ./php-argv-parser.php -fname="Mohammed AlShannaq" -nickname=mshannaq
~~~~
The output will be:
````
Array
(
    [fname] => Mohammed AlShannaq
    [nickname] => mshannaq
)
````

### Example 4:

~~~~
 ./php-argv-parser.php -A -R -gf -k=0
 ~~~~
 The output will be:
 ````
Array
(
    [A] => 1
    [R] => 1
    [gf] => 1
    [k] => 0
)

````
