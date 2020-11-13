<?php
    require_once "utility.php";

    $errors = [];
    $response = [];

    if ($_POST)
    {
        $title = isset($_POST["title"]) ? testInput($_POST["title"]) : ""; 
        $teacher = isset($_POST["teacher"]) ? testInput($_POST["teacher"]) : "";
        $description = isset($_POST["description"]) ? testInput($_POST["description"]): "";
        $group = $_POST["group"];
        $credits = testInput($_POST["credits"]);

        if (!$title)
        {
            $errors[] = "Името е задължително поле.";
        }
        if ($title && strlen($title) > 150)
        {
            $errors[] = "Името е с максимална дължина от 150 символа.";
        }
        if (!$teacher)
        {
            $errors[] = "Името на преподавателя е задължително поле.";
        }
        if ($teacher && strlen($teacher) > 200)
        {
            $errors[] = "Името на преподавателя е с максимална дължина от 200 символа.";
        }
        if (!$description)
        {
            $errors[] = "Описанието е задължително поле.";
        }
        if ($description && strlen($description) < 10)
        {
            $errors[] = "Описанието е с минимална дължина от 10 символа."; 
        }

        if ($title && $teacher && $description)
        {
            if (strlen($title) <= 150 && strlen($teacher) <= 200 && strlen($description) >= 10)
            {
                $response = ["success" => "true", 
                             "име" => $title, 
                             "преподавател" => $teacher, 
                             "описание" => $description,
                             "група" => $group,
                             "кредити" => $credits];
        }

        if ($errors)
        {
            foreach($errors as $error)
            {
                echo $error;
                echo "<br />";
            }
        }
        else 
        {
            echo "Избираемата дисциплина е записана успешно!";
            echo "<br />";
            echo "<br />";
            foreach($response as $key => $value) 
            {
                if ($key !== "success")
                {
                    echo "$key: $value";
                    echo "<br/>";
                }
            }
        }
    }
    else 
    {
        echo "Невалидна заявка";
    }
} 
?>
