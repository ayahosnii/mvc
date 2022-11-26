<style>
    @import url('https://fonts.googleapis.com/css?family=Audiowide&display=swap');



    h1{
        position: absolute;
        top: 0;
        left: 50%;
        font-size: 32px;
        text-transform: uppercase;
        transform: translate(-50%, -50%);
        display: block;
        color: #12000a;
        font-weight: 300;
        font-family: Audiowide;
        text-shadow: 0px 0px 4px #12000a;
        animation: fadeInText 1s ease-in 1.5s forwards, flicker4 3s linear 5.5s infinite, hueRotate 4s ease-in-out 1s infinite;
    }



    @keyframes flicker4{
        0%  {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        30% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        31% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        32% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        36% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        37% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        41% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        42% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        85% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        86% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        95% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        96% {color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
        100%{color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
    }

    @keyframes fadeInText{
        1%  {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        70% {color: #ff005d;text-shadow:0px 0px 14px #ff005d;}
        100%{color: #ff005d;text-shadow:0px 0px 4px #ff005d;}
    }

    @keyframes hueRotate{
        0%  {
            filter: hue-rotate(0deg);
        }
        50%  {
            filter: hue-rotate(-120deg);
        }
        100%  {
            filter: hue-rotate(0deg);
        }
    }

    /**{*/
    /*    margin: 0;*/
    /*    padding: 0;*/
    /*    border: 0;*/
    /*    outline: none;*/
    /*    line-height: 1.2;*/
    /*    font-size: 1em;*/
    /*}*/

    div.wrapper {
        overflow: hidden;

    }
    div.wrapper div.empform{
        float: left;

    }

    div.wrapper div.employees{
        margin: 0 auto;
        width: 700px;
    }

    form.app_form{
        width: 500px;
        margin: 20px;
    }

    form.app_form fieldset{
        padding: 10px;
        background: #f1f1f1;
        border: solid 1px #e4e4e4;
    }
    form.app_form fieldset legend{
        font: 1em 'Arial, Helvetice, sans-serif';
        color: #666;
        background: #e4e4e4;
        padding: 5px;
    }

    form.app_form fieldset p.message{
        background: #9adc81;
        border: #5daf00;
        color: #000000;
        padding: 5px;
        margin: 3px;
        border-radius: 3px;
    }
    form.app_form fieldset p.message.error{
        background: #dc8181;
        border: #af0000;
        color: #000000;
        padding: 5px;
        margin: 3px;
    }

    form.app_form table {
        width: 100%;
    }
    form.app_form label {
        font-family: Arial;
        color: #666666;
    }
    form.app_form table tr td input/*[type=text]*/{
        width: 90%;
        padding: 2%;
        font-size: 1em;

    }
    form.app_form table tr td input[type=submit]{
        padding: 8px;
        border-radius: 3px;
        background: darkcyan;
        color: #fff;
        font-family: Arial;
        font-size: 1em;
        cursor: pointer;
    }
    form.app_form table tr td{
        padding: 4px;
    }

    div.wrapper div.employees table{
        width: 780px;
        margin: 20px 20px 0 0;
        border-collapse: collapse;
    }

    div.wrapper div.employees table thead th{
        text-align: left;
        padding: 5px;
        border-left: solid 2px #e4e4e4;
        border-bottom: solid 2px #e4e4e4;
        font: bold 0.9em Arial Helvetica, sans-serif;
    }

    div.wrapper div.employees table thead th:last-of-type{
        border-right: none;
    }

    div.wrapper div.employees table tbody td{
        text-align: left;
        padding: 5px;
        border: solid 1px #e4e4e4;
        font: bold 0.9em Arial Helvetica, sans-serif;
    }

    div.wrapper div.employees table tbody td a:link,
    div.wrapper div.employees table tbody td a:visited{
        color: darkcyan;
    }
</style>

<link rel="stylesheet" href="../../public/main.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">



<div class="wrapper">
    <?php if (isset($_SESSION['message'])) { ?>
        <p class="message <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message'] ?></p>
        <?php
        unset($_SESSION['message']);
    }
    ?>
    <div class="employees">
        <a href="/employee/add"
           style="background-color: darkcyan; color: #FFF; padding: 10px; font-family: Arial;
                  font-size: 1em; cursor: pointer; border-radius: 3px; text-decoration: none;" >Add Employee</a>
        <table>
            <thead>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Tax (%)</th>
            <th>Control</th>
            </thead>
            <tbody>
            <?php
            if (false !== $employees) {
                foreach ($employees as $employee) {
                    ?>
                    <tr>
                        <td><?= $employee->name?></td>
                        <td><?= $employee->age?></td>
                        <td><?= $employee->address?></td>
                        <td><?= $employee->calculateSalary()?> LE</td>
                        <td><?= $employee->tax?></td>
                        <td>
                            <a href="/employee/edit/<?= $employee->id?>"><i class="fa fa-edit"></i></a>
                            <a href="/employee/delete/<?= $employee->id?>" onclick="if (!confirm('Do you want to delete this employee')) return false"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    <?php
                }
            } else {
                ?>
                <td colspan="5"><p>Sorry no employees in this list</p></td>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

