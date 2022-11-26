<?php

namespace mvc\app\controllers;


use app\models\Employee;
use mvc\app\lib\Helper;
use  mvc\app\lib\InputFilter;

require_once 'C:\xampp\htdocs\mvc\app\models\Employee.php';

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_data['employees'] = Employee::getAll();
        $this->_view();
    }

    public function addAction()
    {
        if(isset($_POST['submit'])){
            $emp = new Employee();
            $emp->name = $this->filterString($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if ($emp -> save()) {
                $_SESSION['message'] = 'Employee, ' . $emp->name .' has saved successfully';
                $this->redirect('/employee');
            }
            var_dump($emp);
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = filter_var($this->_params[0], FILTER_SANITIZE_NUMBER_INT);
        $emp = Employee::getByPK($id);
        if ($emp === false) {
            $this-> redirect('/employee');
        }

        $this->_data['employee'] = $emp;
        if(isset($_POST['submit'])){
            $emp = new Employee();
            $emp->name = $this->filterString($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterString($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if ($emp -> save()) {
                $_SESSION['message'] = 'Employee, ' . $emp->name .' has saved successfully';
                $this->redirect('/employee');
            }
            var_dump($emp);
        }
        $this->_view();
    }
}