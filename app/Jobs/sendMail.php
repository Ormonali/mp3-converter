<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
require __DIR__. '../../../vendor/autoload.php';
use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;
use App\Mail\mailQuery;
class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $link;

    public $tries = 1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$link)
    {
        $this->email = $email;
        $this->link = $link;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dl = new YoutubeDl([
            'extract-audio' => true,
            'audio-format' => 'mp3',
            'audio-quality' => 0, 
            'prefer-ffmpeg'=>true,
            'ffmpeg-location' => '/usr/bin/ffmpeg',
            'output'=>'%(title)s.%(ext)s',
        ]);
    
        $dl->setDownloadPath('public/converted');
        $dl->setBinPath('/usr/local/bin/youtube-dl');
        $audio = $dl->download($this->link);  
        $filename = str_replace(' ', '_', $audio->get('_filename'));
        $title = $audio->getTitle();
        $file = array('path' => 'http://localhost/mp3-converter/public/download/'.$filename,'name' =>$title);
        Mail::to($this->email)->send(new mailQuery($file));
    }
}