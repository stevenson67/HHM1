<?
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'hhm');

/**
 * @param $value
 * @return bool
 */
function ValidateEmail($value) {
    $regex = '/^\S+@\S+\.\S+$/i';
    if ($value === '') {
        return false;
    } else {
        $string = preg_replace($regex, '', $value);
    }
    return empty($string) ? true : false;
}

$post = (!empty($_POST)) ? true : false;

if ($post) {

    $name = stripslashes($_POST['name']);
    $email = stripslashes($_POST['email']);
    $comment = stripslashes($_POST['comment']);
    $resultArray = array('status' => false);

    if ($name !== '' && ValidateEmail($email) && $comment !== '') {

        $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE) or die('Ошибка ' . mysqli_error($mysqli));
        $sql = "INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $comment);
        $stmt->execute();
        $insert_id = $mysqli->insert_id;
        $mysqli->close();

        if ($insert_id !== 0) {
            $resultArray['status'] = true;
            $resultArray['data'] = array('id' => $insert_id, 'name' => $name, 'email' => $email, 'comment' => $comment);
            echo json_encode($resultArray);
        } else {
            $resultArray['error'] = 'DB error';
            echo json_encode($resultArray);
        }
    } else {
        $resultArray['error'] = 'Validation error';
        echo json_encode($resultArray);
    }


}
