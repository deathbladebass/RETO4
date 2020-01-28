<?php
//////////////////////////////////////////
$PHPSESSID=(filter_input(INPUT_GET,"PHPSESSID"));

if ($PHPSESSID==null )

{

    $PHPSESSID=filter_input(INPUT_POST,"PHPSESSID");

}
///////////////////////////////////

if ($PHPSESSID == '')   //si llega PHPSESSID a '', crear session nueva, sino restaurar la que tiene que ser

    {

        session_start();

        $PHPSESSID=session_id();
        $_SESSION['PHPSESSID']=$PHPSESSID;
    } else {

        session_id($PHPSESSID);
        $_SESSION['PHPSESSID']=$PHPSESSID;  
        session_start();

    }

?>