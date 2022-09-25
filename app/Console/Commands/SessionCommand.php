<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\SessionNotification;
use \Auth;

class SessionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification to healer when his session befor 10 mintes';

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
     * @return int
     */
    public function handle()
    {
        // $tenMen = Carbon::now()->subMinutes(12);
        $tenMen = Carbon::now()->subDays(10);
        $sessions = Session::whereBetween('date_time', [ $tenMen, Carbon::now()])->with('user')->get();

        foreach($sessions as $session) {            
            // User::whereId(1)->update(['name' => $session->user->email]);
            $data['id']      = $session['id']; 
            $data['name']    = $session['date_time']; 
            $data['message'] = 'The session before 10 minutes'; 
            $session->user->notify(new SessionNotification($data));
        }
    }
}
