<h1>Administration General Page</h1><br/>
<form method="post" action="">
    <button>Получить список меню</button>
    <table>
        <caption> Перечень меню</caption>
        <?php
        //require 'lib/connect.php';
        // SQL-запрос
        $sql = "SELECT * FROM menu ORDER BY date DESC";

        // Выполнить запрос (набор данных $rs содержит результат)
         $rs = query($sql);
        //App::$db->query($sql);
        // Цикл по recordset $rs
        // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
        while($row = fetch_array($rs)) {
            // Записать значение столбца FirstName (который является теперь массивом $row)
            echo"<tr>";
            echo"<tr>";
            echo"".$row['znachenie']."";
            echo"".$row['znachenie']."";
            echo"".$row['znachenie']."";
            echo"".$row['znachenie']."";
            echo"</td>";
            echo"</tr>";

        }    ?>



        <table/>

        <button>Получить список меню</button>
        <table>
            <caption> Перечень меню</caption>
            <?php
            //require 'lib/connect.php';
            // SQL-запрос
            $sql = "SELECT * FROM menu ORDER BY date DESC";

            // Выполнить запрос (набор данных $rs содержит результат)
            $rs = query($sql);
            //App::$db->query($sql);
            // Цикл по recordset $rs
            // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
            while($row = fetch_array($rs)) {
                // Записать значение столбца FirstName (который является теперь массивом $row)
                echo"<tr>";
                echo"<tr>";
                echo"".$row['znachenie']."";
                echo"".$row['znachenie']."";
                echo"".$row['znachenie']."";
                echo"".$row['znachenie']."";
                echo"</td>";
                echo"</tr>";

            }    ?>



            <table/>

            <button>Получить список пользователей</button>
            <table>
                <caption> Перечень пользователей</caption>
                <?php
                //require 'lib/connect.php';
                // SQL-запрос
                $sql = "SELECT * FROM users ORDER BY date DESC";

                // Выполнить запрос (набор данных $rs содержит результат)
                $rs = query($sql);
                //App::$db->query($sql);
                // Цикл по recordset $rs
                // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
                while($row = fetch_array($rs)) {
                    // Записать значение столбца FirstName (который является теперь массивом $row)
                    echo"<tr>";
                    echo"<tr>";
                    echo"".$row['znachenie']."";
                    echo"".$row['znachenie']."";
                    echo"".$row['znachenie']."";
                    echo"".$row['znachenie']."";
                    echo"</td>";
                    echo"</tr>";

                }    ?>



                <table/>





















</form>


<?php ?>
