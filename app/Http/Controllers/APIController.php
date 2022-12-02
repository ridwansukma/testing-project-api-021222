<?php

namespace App\Http\Controllers;
use App\Models\User;

class APIController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index($bilangan = '', $angka = 0)
    {
        try {
            if( $bilangan !== '' && $angka !== 0 ) {
                if( $bilangan === 'segitiga' ) {
                    $explodeAngka = str_split($angka);
                    $dataAngka = [];
                    foreach ($explodeAngka as $key => $value) {
                        $keys = $key + 1;
                        $zero = '';
                        for ($i=0; $i < $keys; $i++) { 
                            $zero .= "0";
                        }
                        array_push($dataAngka, $value . $zero);
                    }
                    echo json_encode(array(
                        'message'   => 'success',
                        'angka'     => $dataAngka
                    ));   
                } else if( $bilangan === 'ganjil' ) {
                    $dataAngka = [];
                    $countAngka = (int)$angka;
                    for ($i=1; $i <= $countAngka; $i++) { 
                        if( $i % 2 === 1) {
                            array_push($dataAngka, $i);
                        }
                    }
                    echo json_encode(array(
                        'message'   => 'success',
                        'angka'     => $dataAngka
                    ));    
                } else if( $bilangan === 'prima' ) {
                    $dataAngka = [];
                    $countAngka = (int)$angka;
                    for ($i=1; $i <= $countAngka; $i++) { 
                        $x = 0;
                        for ($z=1; $z <= $i; $z++) { 
                            if( $i % $z === 0 ) {
                                $x++;
                            }
                        }

                        if( $x === 2 ) {
                            array_push($dataAngka, $i);
                        }
                    }
                    echo json_encode(array(
                        'message'   => 'success',
                        'angka'     => $dataAngka
                    ));    
                }
            } else {
                echo json_encode(array(
                    'message'   => 'error',
                    'angka'     => []
                ));
            }
        } catch (\Throwable $th) {
            echo json_encode(array(
                'message'   => 'error ' . $th->getMessage(),
                'angka'     => []
            ));
        }
    }
}