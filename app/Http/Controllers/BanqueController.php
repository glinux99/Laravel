<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BanqueController extends Controller
{
    public function login(){
        return view('login');
    }
    public function accounts($data){
        if($data =='accounts'){
            $data_active =1;
            $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')->get();
            return view('admin.admin', compact(['data_users', 'data_active']));
        }
    }
    public function solde_banque(){
        $solde=1;
        $data = session('data');
        return view('admin.admin', compact(['solde', 'data']));
    }
    public function add_agents(){
        return view('admin.add_agent');
    }
    public function alter_clients_and_agents(){
        $data_users = \DB:: table ('Customers')
                        ->join('Adresse', 'Customers.adresse_id', '=', 'Adresse.id')
                        ->join('Compte', 'Adresse.id_compte', '=','Compte.id')->get();
                        
        return view('admin.suppression_agent', compact(['data_users']));

    }
    // public function inscription(Request $request){
    //     $insc = \DB::table('Inscription')->Where ('adresse_mail', $request->mail)->first();
    //     if(!$insc){
    //         $code_auth = (STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9));
    //     $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
    //     $order = session('account');
    //     \DB::table('Operations')->insert(
    //         array(
    //             'date_op'=>NOW(),
    //             'code_auth'=>$code_auth
    //         )
    //         );
    //         $operation_id = \DB::table('Operations')
    //                         ->where('code_auth',$code_auth)->first(); 
    //         \DB::table('Compte')->insert(
    //             array(
    //                 'code_auth'=>$code_auth,
    //                 'date_creation'=>NOW(),
    //                 'matricule'=>$request->matricule
    //             )
    //             );
    //                 $id_compte =\DB::table('Compte')
    //                                 ->where('code_auth',$code_auth)->first();
    //                 \DB::table('Adresse')->insert(
    //                     array(
    //                         'code_auth'=>$code_auth,
    //                         'id_compte'=>$id_compte->id
    //                     )
    //                     );
    //                     $adresse_id =\DB::table('Adresse')
    //                                         ->where('code_auth',$code_auth)->first();         
    //                     \DB::table('Customers')->insert(
    //                         array(
    //                             'nom'=>$request->nom,
    //                             'prenom'=>$request->prenom,
    //                             'adresse_mail'=>$request->mail,
    //                             'matricule'=>$request->matricule,
    //                             'password_customers' =>$request->psswd,
    //                             'type_compte'=>'Client',
    //                             'code_auth'=>$code_auth,
    //                             'adresse_id'=>$adresse_id->id
    //                         )
    //                         );
    //                         $customers_id =\DB::table('Customers')
    //                                         ->where('code_auth',$code_auth)->first();
    //                                         \DB::table('Client')->insert(
    //                                             array(
    //                                                 'adresse_id'=>$adresse_id->id,
    //                                                 'customers_id'=>$customers_id->id,
    //                                                 'adresse_mail'=>$request->mail
    //                                             )
    //                                             );
                                                
    //     }else {
    //         $error ="mail_exist";
    //         return view('login', compact('error'));
    //     }
        
    // }
    public function connection(Request $request){
        if($request->nom){
            $insc = \DB::table('Inscription')->Where ('adresse_mail', $request->mail)->first();
        if(!$insc){
            $code_auth = (STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9));
        $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
        $order = session('account');
        \DB::table('Operations')->insert(
            array(
                'date_op'=>NOW(),
                'code_auth'=>$code_auth
            )
            );
            $operation_id = \DB::table('Operations')
                            ->where('code_auth',$code_auth)->first(); 
            \DB::table('Compte')->insert(
                array(
                    'code_auth'=>$code_auth,
                    'date_creation'=>NOW(),
                    'matricule'=>$request->matricule
                )
                );
                    $id_compte =\DB::table('Compte')
                                    ->where('code_auth',$code_auth)->first();
                    \DB::table('Adresse')->insert(
                        array(
                            'code_auth'=>$code_auth,
                            'id_compte'=>$id_compte->id
                        )
                        );
                        $adresse_id =\DB::table('Adresse')
                                            ->where('code_auth',$code_auth)->first();         
                        \DB::table('Customers')->insert(
                            array(
                                'nom'=>$request->nom,
                                'prenom'=>$request->prenom,
                                'adresse_mail'=>$request->mail,
                                'matricule'=>$request->matricule,
                                'password_customers' =>$request->psswd,
                                'type_compte'=>'Client',
                                'code_auth'=>$code_auth,
                                'adresse_id'=>$adresse_id->id
                            )
                            );
                            $customers_id =\DB::table('Customers')
                                            ->where('code_auth',$code_auth)->first();
                                            \DB::table('Client')->insert(
                                                array(
                                                    'adresse_id'=>$adresse_id->id,
                                                    'customers_id'=>$customers_id->id,
                                                    'adresse_mail'=>$request->mail
                                                )
                                                );
                                                
        }else {
            $error ="mail_exist";
            return view('login', compact('error'));
        }
        }
        $tables=['Client', 'Caissier', 'Admins'];
        foreach($tables as $items){
            $customers_id=$items.'.customers_id';
            $adresse_id = 'Customers.Adresse_id';
            $adresse = $items.'.adresse_mail';
            $data = \DB::table($items)
                        ->join('Customers', $customers_id, '=', 'Customers.id')
                        ->join ('Adresse', $adresse_id, '=', 'Adresse.id')
                        ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                        ->where ('password_customers', $request->psswd)
                        ->where(function($req) use($request, $adresse){
                            $req->where ('Customers.adresse_mail', $request->mail)
                            ->orwhere('nom', $request->mail)
                            ->orwhere('Customers.matricule', $request->mail);
                        })->first();
                        if($data){
                            $status =$data->status_compte;
                            if($status) {
                                session()->put('account',$items);
                                session()->put('data', $data);
                                $data= session('data');
                                $data = json_decode(json_encode($data), true);
                                 switch($items){
                                     case 'Client' :
                                         return view('client.client', compact('data'));
                                         break;
                                     case 'Admins':
                                         return view ('admin.admin');
                                     break;
                                     case 'Caissier':
                                         return view ('caissier.caissier');
                                     break;
                                 }
                             }else{
                                $error ="compte_disable";
                                return view('login', compact('error'));
    
                            }
            }
                        
                    }
    }
    public function session_data(){
        $data= session('data');
        $data = json_decode(json_encode($data), true);
        return $data;
    }
    public function logout(){
        session()->flush();
        return view('acceuil');
    }
    public function add_agent_submit(Request $request){
        $code_auth = (STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9));
        $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
        $order = session('account');
        $for_account ='';
        switch($order){
            case 'Admins':
                // Inserer agent or caissier
                $for_account = $request->type_compte;
            break;
            case 'Caissier':
                $for_account = 'Client';
            break;
        }
        \DB::table('Operations')->insert(
            array(
                'date_op'=>NOW(),
                'code_auth'=>$code_auth
            )
            );
            $operation_id = \DB::table('Operations')
                            ->where('code_auth',$code_auth)->first(); 
            \DB::table('Compte')->insert(
                array(
                    'code_auth'=>$code_auth,
                    'date_creation'=>NOW(),
                    'matricule'=>$request->matricule
                )
                );
                    $id_compte =\DB::table('Compte')
                                    ->where('code_auth',$code_auth)->first();
                    \DB::table('Adresse')->insert(
                        array(
                            'code_auth'=>$code_auth,
                            'id_compte'=>$id_compte->id
                        )
                        );
                        $adresse_id =\DB::table('Adresse')
                                            ->where('code_auth',$code_auth)->first();         
                        \DB::table('Customers')->insert(
                            array(
                                'nom'=>$request->nom,
                                'prenom'=>$request->prenom,
                                'adresse_mail'=>$request->mail,
                                'matricule'=>$request->matricule,
                                'password_customers' =>$request->psswd,
                                'numero_tel'=>$request->numero_tel,
                                'type_compte'=>$request->type_compte,
                                'genre'=>$request->genre,
                                'photo'=>$request->photo,
                                'code_auth'=>$code_auth,
                                'adresse_id'=>$adresse_id->id
                            )
                            );
                            $customers_id =\DB::table('Customers')
                                            ->where('code_auth',$code_auth)->first();
                           if($order=='Admins'){
                            \DB::table('Caissier')->insert(
                                array(
                                    'adresse_id'=>$adresse_id->id,
                                    'customers_id'=>$customers_id->id,
                                    'operation_id'=>$operation_id->id
                                )
                                );
                           }
                               else if($order=='Caissier'){
                                    \DB::table('Client')->insert(
                                    array(
                                        'adresse_id'=>$adresse_id->id,
                                        'customers_id'=>$customers_id->id,
                                        'adresse_mail'=>$request->mail
                                    )
                                    );
                                }
                
    }
    public function alter_account(Request $request){
        $order =session('account');
        switch($order){
            case 'Admins' :
                $for_account = 'Caissier';
            break;
            case 'Caissier' :
                $for_account = 'Client';
            break;
        }
        $customers_id =$for_account.'.Customers_id';
        $data_user = \DB:: table ($for_account)
                                ->join('Customers', $customers_id, '=', 'Customers.id')
                                ->join('Adresse', 'Customers.adresse_id', '=', 'Adresse.id')
                                ->where ('Customers.matricule', $request->mail)
                                ->orwhere('Customers.adresse_mail', $request->mail)->first();
                                session('data_user', $data_user);
        return view('caissier.alter_account');
    }
    public function update(Request $request){
        $d=\DB:: table('Customers')
                ->join('Adresse', 'Customers.adresse_id', '=', 'Adresse.id')
                ->where('Customers.matricule', $request->matricule)
                ->update(array(
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'adresse_mail'=>$request->mail,
                    'password_customers'=>$request->psswd,
                    'numero_tel'=>$request->numero_tel,
                    'type_compte'=>$request->type_compte,
                    'genre'=>$request->genre,
                    'photo'=>$request->photo,
                    'quart_av'=>$request->quart_av,
                    'ville'=>$request->ville,
                    'province'=>$request->province,
                    'pays'=>$request->pays,
                    'apropos'=>$request->apropos
                ));
               session('error', 'no-error');
               return back();
            }
        public function verifier_solde(Request $request){
            $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.matricule', $request->mail)
                                ->orwhere('Customers.adresse_mail', $request->mail)
                                ->first();
                                $modal_aff=1;
                                $data_users =json_decode(json_encode($data_users), true);
                               return view('caissier.caissier', compact(['data_users','modal_aff']));
        }
        public function depot_argent(Request $request){
            $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.matricule', $request->mail)
                                ->orwhere('Customers.adresse_mail', $request->mail)->first();
                                $solde = $data_users->solde;
                                $solde=$request->montant+$solde;
                                $matricule=$data_users->matricule;
            $data_users = \DB:: table ('Compte') 
                                ->where('matricule', $matricule) 
                                ->update(array(
                                    'solde'=> $solde
                                ));                
                                

        }
        public function retrait_argent(Request $request){
            $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.matricule', $request->mail)
                                ->orwhere('Customers.adresse_mail', $request->mail)->first();
                                $solde = $data_users->solde;
                                echo $solde.PHP_EOL;
                                echo ($solde=$solde-$request->montant).PHP_EOL;
                               if($solde>5){
                                $solde=$solde-$request->montant;
                                $matricule=$data_users->matricule;
                                $data_users = \DB:: table ('Compte') 
                                ->where('matricule', $matricule) 
                                ->update(array(
                                    'solde'=> $solde
                                ));
                                // session()->put('error','no_error');
                                // return redirect()->back();
                               }else if($solde ==5){
                                   session()->put('error','solde_egal');
                                   return redirect()->back();

                               }else  {
                                session()->put('error','solde_insuf');
                                return redirect()->back();
                               }              
                                

        }
        public function virement(Request $request){
            $data= session('data');
            $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.password_customers', $request->psswd)
                                ->where ('Customers.matricule', $data->matricule)->first();
                                $solde = $data_users->solde;
                                $solde_f = $solde-$request->montant;
                               if($solde>5){
                               $benef = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.adresse_mail', $request->mail)
                                ->orwhere ('Customers.matricule', $request->mail)
                                ->first();
                                $soldeb = $benef->solde+$request->montant;
                                \DB:: table ('Compte') 
                                ->where('matricule', $benef->matricule) 
                                ->update(array(
                                    'solde'=> $soldeb
                                ));
                                \DB:: table ('Compte') 
                                ->where('matricule', $data->matricule) 
                                ->update(array(
                                    'solde'=> $solde_f
                                ));

                                $data =json_decode(json_encode($data), true);
                                session()->put('error','no_error');
                                return view('client.client',compact('data'));
                               }else if($solde ==5){
                                   session()->put('error','solde_egal');
                                   return redirect()->back();

                               }else  {
                                session()->put('error','solde_insuf');
                                return redirect()->back();
                               }              
                                

        }
        public function desactive($id){
            \DB::table('Compte')
                    ->where('id', $id)
                    ->update(array(
                        'status_compte'=>0
                    ));
                    return back();
        }
        public function active($id){
            \DB::table('Compte')
                    ->where('id', $id)
                    ->update(array(
                        'status_compte'=>1
                    ));
                    return back();
        }
        public function delete($id){
            \DB::table('Compte')
                    ->where('id', $id)
                    ->delete();
                    return back();
        }
        
   
}
