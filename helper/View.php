<?php
    namespace Helper;

    class View{
        public static function view($view, $data = NULL)
        {
            $output = NULL;
            if(file_exists($view)){
                if(!is_null($data)){
                    extract($data);
                }

                ob_start();
                require $view;
                $output = ob_get_clean();
            }
            print($output);
        }

        public static function viewTemplate($view, $template, $data = NULL)
        {
            $output = NULL;
            if(file_exists($view)){
                if(!is_null($data)){
                    extract($data);
                }

                ob_start();
                require $view;
                $output = ob_get_clean();
            }


            self::view($_SERVER['DOCUMENT_ROOT'].'/views/template/'.$template, ['main' => $output]);
        }
    }
?>