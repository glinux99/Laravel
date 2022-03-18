<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BanqueController extends Controller
{
    public function login(){
        return \Redirect::to('login');
    }
    public function accounts($data){
        try{
            if($data =='accounts'){
                $data_active =1;
                $data_users = \DB:: table ('Client')
                                    ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')->get();
                return view('admin.admin', compact(['data_users', 'data_active']));
            }
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function solde_banque(){
        try{
            $solde=1;
            $solde_all =\DB::table('Compte')
                    ->sum('solde');
            $data = session('data');
            return view('admin.admin', compact(['solde', 'data', 'solde_all']));
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function add_agents(){
        try{
            return view('admin.add_agent');
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function alter_clients_and_agents(){
        try{
            if(session('account')==='Admins'){
                $data_users = \DB:: table ('Customers')
                        ->join('Adresse', 'Customers.adresse_id', '=', 'Adresse.id')
                        ->join('Compte', 'Adresse.id_compte', '=','Compte.id')->get();
                        
                return view('admin.suppression_agent', compact(['data_users']));
            }
            return back();
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }

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
        try{
            if($request->nom){
                $insc = \DB::table('Inscription')->Where ('adresse_mail', $request->mail)->first();
            if(!$insc){
                $code_auth = (STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9)).(STRING) (rand(1,9));
                $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6);
                $order = session('account');
                \DB::table('Inscription')->insert([
                    'adresse_mail'=>$request->mail,
                    'code'=>$code
                ]);
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
                                        'photo'=>$request->photo,
                                        'code_auth'=>$code_auth,
                                        'adresse_id'=>$adresse_id->id
                                    )
                                    );
                                    $customers_id =\DB::table('Customers')
                                                    ->where('code_auth',$code_auth)->first();
                                                    if($customers_id->id!=1){
                                                        \DB::table('Client')->insert(
                                                            array(
                                                                'adresse_id'=>$adresse_id->id,
                                                                'customers_id'=>$customers_id->id,
                                                                'adresse_mail'=>$request->mail
                                                            )
                                                            );
                                                }else{
                                                    \DB::table('Admins')->insert(
                                                        array(
                                                            'adresse_id'=>$adresse_id->id,
                                                            'customers_id'=>$customers_id->id
                                                        )
                                                        );
                                                }
                                                
                                                    
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
                        $error ="compte_disable";
                                    return view('login', compact('error'));
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function session_data(){
        try{
            $data= session('data');
            $data = json_decode(json_encode($data), true);
            return $data;
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function logout(){
        try{
            session()->flush();
            return view('acceuil');
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function add_agent_submit(Request $request){
        try{
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
                
                \DB::table('Inscription')->insert([
                    'adresse_mail'=>$request->mail,
                    'code'=>$code
                ]);
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
                                        session()->put('error','no-error');
                                        return back();
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
                
    }
    public function alter_account(Request $request){
        try{
            $order =session('account');
            switch($order){
                case 'Admins' :
                    $for_account = 'Caissier';
                break;
                case 'Caissier' :
                    $for_account = 'Client';
                break;
                case 'Client':
                    $for_account = 'Client';
                break;
            }
                $customers_id =$for_account.'.customers_id';
                $username = $request->mail;
                if($for_account==='Client'){
                    $username = session('data')->matricule;
                }
                $data_user2='';
                $data_user = \DB:: table ($for_account)
                                        ->join('Customers', $customers_id, '=', 'Customers.id')
                                        ->join('Adresse', 'Customers.adresse_id', '=', 'Adresse.id')
                                       ->get();
                                       foreach($data_user as $items){
                                           if($items->matricule===$username) $data_user2=$items;
                                       }
                                        session()->put('data_user', $data_user2);
                                        if(!session('data_user')){
                                            session()->put('error', 'no_autorization');
                                            return back();
                                        }
                                       // var_dump($data_user);
                return view('caissier.alter_account');
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
    public function update(Request $request){
        try{
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
        }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
        public function verifier_solde(Request $request){
            try{
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
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function depot_argent(Request $request){
            try{
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
                                $effect_par = ' par '.$request->username;
                                $trans_mat  = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
                                $trans_mat = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("0123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                                $id =\DB::table('Caissier')
                                        ->select('Caissier.id')
                                        ->join('Customers', 'Customers.id','=','customers_id')
                                        ->where('Customers.id','=',session('data')->id)->first();
                                \DB:: table('Transactions')
                                    ->insert([
                                        'montant_ret'=>$request->montant,
                                        'solde'=>$solde,
                                        'motif'=>'Depot '.$effect_par,
                                        'trans_mat'=>$trans_mat,
                                        'client_mat'=>$matricule,
                                        'caissier_id'=>$id->id
                                    ]);             
                     session()->put('error','no-error');
                     return redirect()->route('caissier');   
            }  catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }      

        }
        public function retrait_argent(Request $request){
            try{
                $data_users = \DB:: table ('Client')
                                ->join('Customers', 'Client.Customers_id', '=', 'Customers.id')
                                ->join('Adresse', 'Customers.Adresse_id', '=','Adresse.id')
                                ->join('Compte', 'Adresse.id_compte', '=','Compte.id')
                                ->where ('Customers.matricule', $request->mail)
                                ->orwhere('Customers.adresse_mail', $request->mail)->first();
                                $solde = $data_users->solde;
                                if($request->username!='')
                                    $effect_par=" par ".$request->username;
                                else $effect_par='';
                                $trans_mat  = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
                                $trans_mat = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("0123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                               if($solde>5){
                                $solde=$solde-$request->montant;
                                $matricule=$data_users->matricule;
                                $data_users = \DB:: table ('Compte') 
                                ->where('matricule', $matricule) 
                                ->update(array(
                                    'solde'=> $solde
                                ));
                                $id =\DB::table('Caissier')
                                        ->select('Caissier.id')
                                        ->join('Customers', 'Customers.id','=','customers_id')
                                        ->where('Customers.id','=',session('data')->id)->first();
                                \DB:: table('Transactions')
                                    ->insert([
                                        'montant_ret'=>$request->montant,
                                        'solde'=>$solde,
                                        'motif'=>'Retrait'.$effect_par,
                                        'trans_mat'=>$trans_mat,
                                        'client_mat'=>$matricule,
                                        'caissier_id'=>$id->id
                                    ]);
                                    
                                // session()->put('error','no_error');
                                // return redirect()->back();
                               }else if($solde ==5){
                                   session()->put('error','solde_egal');
                                   return redirect()->route('caissier');  

                               }else  {
                                session()->put('error','solde_insuf');
                                return redirect()->route('caissier');  
                               }              
                               session()->put('error','no-error');
                               return redirect()->route('caissier');  
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }           

        }
        public function virement(Request $request){
            try{
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
                                $compte_de=$benef->nom.' '.$benef->prenom;
                                $trans_mat  = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 6);
                                $trans_mat = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("0123456789"), 0, 6).'.'.$trans_mat;
                                $trans_mat = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ123456789"), 0, 6).'.'.$trans_mat;
                                \DB:: table('Transactions')
                                    ->insert([
                                        'montant_ret'=>$request->montant,
                                        'solde'=>$solde,
                                        'motif'=>'Virement sur le compte de '.$compte_de,
                                        'trans_mat'=>$trans_mat,
                                        'client_mat'=>$data->matricule,
                                        'caissier_id'=>null
                                    ]);
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
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function message($dest){
            try{
                $dest_name=\DB::table('Customers')
                ->where('matricule',$dest)->first();
                $data = \DB::table('Customers')
                            ->where('matricule', '!=',session('data')->matricule)->get();
                if($dest_name){
                    session()->put('dest_matricule',$dest_name->matricule);
                    $dest_name = session()->put('dest_name', $dest_name->nom.' '.$dest_name->prenom);   
                }
                $dest_name = session('dest_name');
                $dest_ip = session('dest_matricule');
                $message = \DB::table('Messages')
                            ->where(function($req) use($dest_ip){
                                $req->where('source_id',session('data')->matricule)
                                    ->where('destination_id',$dest_ip)->get();
                            })
                            ->orwhere(function($req) use($dest_ip){
                                $req->where('destination_id',session('data')->matricule)
                                    ->where('source_id',$dest_ip)->get();
                            })->get();
                            session()->put(array(
                                'mess'=>$message,
                                'data_list'=>$data,
                                'dest_name'=>$dest_name
                            ));
                            if($dest=='nuru_banque'){
                                $dest_name="Nuru Banque";
                                $message = \DB::table('Messages')
                                                ->where('mode',0)->get();
                                                session()->put('dest_nuru','nuru');
                            }
            return view('message', compact(['message','data', 'dest_name']));
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function send_message(Request $request){
           try{
                    $data = session('data_list');
                    if(session('dest_nuru')=='nuru'){
                        \DB::table('Messages')->insert(array(
                            'source_id'=>session('data')->matricule,
                            'destination_id'=>'',
                            'messages'=>$request->message,
                            'mode'=>0
                        ));
                        session()->pull('dest_nuru','');
                        $message = \DB:: table('Messages')
                                        ->where('mode',0)->get();  
                                        $dest_name = 'Nuru Banque';
                    }else{
                        \DB::table('Messages')->insert(array(
                            'source_id'=>session('data')->matricule,
                            'destination_id'=>session('dest_matricule'),
                            'messages'=>$request->message,
                            'mode'=>1
                        ));
                        $dest_name = session('dest_name');
                        $dest_ip=session('dest_matricule');
                        
                        $message =$message = \DB::table('Messages')
                                        ->where(function($req) use($dest_ip){
                                            $req->where('source_id',session('data')->matricule)
                                                ->where('destination_id',$dest_ip)->get();
                                        })
                                        ->orwhere(function($req) use($dest_ip){
                                            $req->where('destination_id',session('data')->matricule)
                                                ->where('source_id',$dest_ip)->get();
                                        })->get();
                                        session()->put(array(
                                            'mess'=>$message,
                                            'data_list'=>$data,
                                            'dest_name'=>$dest_name
                                        ));
                        
                    }
                return view('message', compact(['message','data', 'dest_name']));
           }catch (Exception $e){
            session()->put('error','one_thing_not_running');
            return redirect(url('/'));
        }
    }
        public function rapport(Request $request){
            try{
                $transaction ="";
                    if(session('account')!='Client'){
                        $chp = ['client_mat', 'benef_mat'];
                        $transaction = \DB::table('Transactions')
                                        ->join('Customers', 'matricule', $chp[0])
                                        ->where('client_mat',$request->mail)
                                        ->orwhere('benef_mat', $request->mail)->get();
                                        if(!$transaction){
                                            $transaction = \DB::table('Transactions')
                                        ->join('Customers', 'matricule', $chp[1])
                                        ->where('client_mat',$request->mail)
                                        ->orwhere('benef_mat', $request->mail)->get();
                                        }
                                        if(session('account')==='Admins'){
                                            $transaction = \DB::table('Transactions')
                                                ->join('Caissier', 'Caissier.id', 'caissier_id')
                                                ->join('Customers', 'Customers.id','Caissier.customers_id')
                                                ->where('matricule',$request->mail)->get();
                                                
                                        }
                    }else{
                        $autori = \DB::table("Customers")
                                    ->where('password_customers', $request->psswd)->first();
                        if($autori){
                            $transaction = \DB::table('Transactions')
                                        ->where('client_mat',$request->mail)
                                        ->orwhere('benef_mat', $request->mail)->get();
                        }else{
                            $data = session('data');
                            $data = json_decode(json_encode($data), true);
                            return view('client.client',compact('data'));
                        }
                    }
                                        $client =1;
                                        if(isset($request->mail)){
                                            $cli_mat = $request->mail;
                                        }else $cli_mat = session('data')->matricule;
                                        $nom = \DB::table("Customers")
                                                    ->where('matricule', $cli_mat)->first();
                                        session()->put('nom_cli_trans', $nom->nom.' '.$nom->prenom);
                                        session()->put('trans_pdf',$transaction);
                                        session()->put('matCli',$cli_mat);
                                        //var_dump($transaction);
                                        // var_dump(session('data')->matricule);
                                        $transaction = json_decode(json_encode($transaction),true);
                                        foreach($transaction as $items ){
                                            var_dump($items);
                                        }
                                        echo 'adsd';
                    //return view('transaction', compact(['transaction','client']));
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function desactive($id){
            try{
                \DB::table('Compte')
                    ->where('id', $id)
                    ->update(array(
                        'status_compte'=>0
                    ));
                    return back();
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function active($id){
            try{
                \DB::table('Compte')
                    ->where('id', $id)
                    ->update(array(
                        'status_compte'=>1
                    ));
                    return back();
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function delete($id){
            try{
                \DB::table('Compte')
                    ->where('id', $id)
                    ->delete();
                    return back();
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        public function transaction(){
            try{
                $mat = session('data');
                $transaction='';
                if(session('account')=='Caissier'){
                    $transaction =\DB::table('Transactions')
                    ->join('Caissier', 'Caissier.id', '=', 'caissier_id')
                    ->join('Customers', 'Customers.id','=', 'customers_id')
                    ->where('Customers.matricule',$mat->matricule)->get();
                    }else if (session('account')==='Admins'){
                            $transaction =\DB::table('Transactions')
                                        ->join('Caissier','Caissier.id','=','caissier_id')
                                        ->join('Customers','customers_id','=','Customers.id')
                                        ->get();
                                        session()->put('trans_pdf', $transaction);
                                        session()->put('matCli', 'Rapport de tous nos clients');
                                        session()->put('nom_cli_trans', 'Rapport de tous nos clients');
                    }else if(session('account')==='Client'){
                            $transaction =\DB::table('Transactions')
                            ->join('Customers', 'Customers.matricule','=', 'client_mat')
                            ->where('Customers.matricule',$mat->matricule)->get();
                        }
                        session()->put('trans_pdf', $transaction);
                    return view('transaction', compact('transaction'));
            }catch (Exception $e){
                session()->put('error','one_thing_not_running');
                return redirect(url('/'));
            }
        }
        
   
}
