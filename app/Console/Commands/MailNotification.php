<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
/* Need to use user app, mail and mailable class "NoticeMail" */
use App\User;
use Mail;
use App\Mail\NoticeMail;
class MailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:me';  /*this is the shortcut , we can execute on the
    terminal by writing php artisan notify:me */
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Registration Count Will Be Sent';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereDate('created_at', now())
                      ->get();  //getting users registered today

        $count =  $users->count('id'); //counting todays users

        Mail::to('stefan.gouldson@caspianinsurance.co.uk')->send(new NoticeMail($users,$count));
        /*sending mail by creatinng object of NoticeMail class
        by passing two parameters e.g $users and $count */
    }
}
