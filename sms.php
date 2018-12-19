<?php
include("includes/connection.php");

function insertMessage ($recipient, $messageType, $messageText)
{
    $query = "insert into ozekimessageout (receiver,msgtype,msg,status) ";
    $query .= "values ('" . $recipient . "', '" . $messageType . "', '" . $messageText . "', 'send');";
    $result = mysql_query($query);
    if (!$result)
    {
        echo (mysql_error() . "<br>");
        return false;
    }

    return true;
}

    if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] == "")
    {
        echo "<font style=\"color: red; font-weight: bold;\">Recipient field mustn't be empty!</font>";
    }
    else if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] != "")
    {
    try
    {
        connectToDatabase();
        if (insertMessage ($_POST["textAreaRecipient"], "SMS:TEXT", $_POST["textAreaMessage"]))
        {
            echo "<font style=\"color: red; font-weight: bold;\">Insert was successful!</font>";
        }
        closeConnection ();
    }
    catch (Exception $exc)
    {
        echo "Error: " . $exc->getMessage();
    }
}
?>
<!DOVTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
    <table border="0" align="center">
        <tr>
            <td colspan="2" align="center">
                <font style="font-weight: bold; font-size: 16px;">Compose message</font>
                <br /><br />
            </td>
        </tr>
        <tr>
            <td valign="top">Recipient: </td>
            <td>
                <textarea name="textAreaRecipient" cols="40" rows="2">...</textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">Message text: </td>
            <td>
                <textarea name="textAreaMessage" cols="40" rows="10">...</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Send">
            </td>
        </tr>
        <tr><td colspan='2' align='center'>
        ...
        </td></tr>
    </table>
</form>
</body>
</html>>