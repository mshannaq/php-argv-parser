#!/usr/bin/env php
<?php
/**
 * php-argv-parser.php : phpParseArgv function :  PHP command line argv (argurments) parser function
 * Author: Mohammed AlShannaq (mshannaq), http://ms.per.jo
 * License: Apache License 2.0
 * This function uses some modified codes of php-argv which was written by samejack , https://github.com/samejack/php-argv
 *
 *
 * I Create the tool as function because I prefer to use it in any one file project, so copy the function(s)
 * below and then append it to your php file if you need any argv parser.
 * for any related questions please contact me http://ms.per.jo/page/contact
 */

function phpParseArgv($argv)
{
    $configs = array();
    if (sizeof($argv) == 0)
        return false;
    for ($index = 1; $index < sizeof($argv); $index++) {
        if (preg_match('/^([^-\=]+.*)$/', $argv[$index], $matches) === 1) {
            // does not have any -= prefix
            $configs[$matches[1]] = true;
        } else if (preg_match('/^-+(.+)$/', $argv[$index], $matches) === 1) {
            // match prefix - with next parameter
            if (preg_match('/^-+(.+)\=(.+)$/', $argv[$index], $subMatches) === 1) {
                $configs[$subMatches[1]] = $subMatches[2];
            } else if (isset($argv[$index + 1]) && preg_match('/^[^-\=]+$/', $argv[$index + 1]) === 1) {
                // have sub parameter , space between = and the parameter value
                $configs[   substr($matches[1], 0, -1) ] = $argv[$index + 1];
                $index++;
            } else {
                $configs[$matches[1]] = true;
            }
        }
    }
    if (sizeof($configs) == 0) {
        return false;
    } else {
        return $configs;
    }

}


/*Examples of run : first example , simple one*/

/**
 * $argv come from the system, but if you want to overwrite it and use your custom variable as argv
 * you can use array for example
 *
 * Array
 * (
 * [0] => ./php-argv-parser.php
 * [1] => --interval=100
 * )

 * but note that the item [0] of the array is ignored as the function know it is the php file name
 * example of using custom argv
 * $custom_argv = array(0=>"./php-argv-parser.php",1=>"--interval=100");
 * then call  phpParseArgv($custom_argv)
 *

 */

$cmds = phpParseArgv($argv);
if (!$cmds) {
    echo "no argv passed\n";
} else {
    print_r($cmds);
}

/*You can test the function as you need here by call phpParseArgv($argc) function and keep
  Your eye on the return result
*/
//The function return array if there are argv parameters passed and return false if no parameters detected */
//EOF