<?php

namespace MVC;

use MVC;

class Index
{
    private $massage;
    public function CreateView($viewName)
    {
        $model = new MVC\Model();
        $view = new MVC\View();

        $massage = '';
        $type = '';

        @$id = $this->clean($_POST['id']);
        @$how = $this->clean($_POST['how']);
        @$mark = $this->clean($_POST['mark']);
        @$date = $this->clean($_POST['date']);
        @$serviceType = $this->clean($_POST['serviceType']);
        @$voice = $this->clean($_POST['voice']);
        @$member = $this->clean($_POST['member']);


        if (!$this->check_length('7','7',$id)){
            $this->massage[] = 'false 1';
        }
        if ($how === 'Выбрать ответ' || !$this->check_length('4','19',$how)){
            $this->massage[] = 'false 2';
        }
        if (!is_int($mark) && !$this->check_length('1','2',$mark)){
            $this->massage[] = 'false 3';
        }
        if (!is_numeric($date) && !$this->check_length('9','10',$date)){
            $this->massage[] = 'false 4';
        }
        if (empty($serviceType)){
            $this->massage[] = 'false 5';
        }
        if (empty($voice)){
            $this->massage[] = 'false 6';
        }
        if (empty($member)){
            $this->massage[] = 'false 7';
        }

        if (empty($this->massage)){
            $contact = $model->getContactsOfLeadById($id);

            $howField = array(
                'field_id' => '425303',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => $how,
                            ),
                    ),
            );
            $markFiled = array(
                'field_id' => '425333',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => $mark,
                            ),
                    ),
            );
            $dateField = array(
                'field_id' => '425347',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => strtotime($date),
                            ),
                    ),
            );
            $serviceTypeField = array(
                'field_id' => '425349',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => $serviceType,
                            ),
                    ),
            );
            $voiceField = array(
                'field_id' => '425351',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => $voice,
                            ),
                    ),
            );
            $memberField = array(
                'field_id' => '425353',
                'values' =>
                    array(
                        0 =>
                            array(
                                'value' => $member,
                            ),
                    ),
            );


            $fields = array(
                'id' => $contact->id,
                'custom_fields_values' =>
                    array(
                        0 => $howField,
                        1 => $markFiled,
                        2 => $dateField,
                        3 => $serviceTypeField,
                        4 => $voiceField,
                        5 => $memberField
                    )

            );
            $patchIt = $model->patch($contact->id, $fields);
            $patch_errors = json_decode(json_encode($patchIt),true);
            if (!empty($patch_errors['validation-errors']))
            {
                $massage = 'Заполните все поля правильно';
                $type = 'danger';
            }
            else{
                $massage = 'Данные добавлены успешно';
                $type = 'success';
            }
        }elseif (!empty($this->massage) && !empty($_POST)){
             $massage = 'Заполните все поля';
             $type = 'danger';
        }

        $vars = array(
            'massage' => array(
                'massage' => $massage,
                'type' => $type
            )
        );

        $view->render($viewName, 'Заполнить форму', $vars);
    }

    private function clean($value = "") {

        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function check_length($min, $max, $value = "") {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
}
