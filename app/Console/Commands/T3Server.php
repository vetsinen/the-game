<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Classes\Socket;

class T3Server extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't3:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates T3 socket';

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

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Socket()
                )
            ),
            8080
        );
        $server->run();
        echo "server started";
    }
}
