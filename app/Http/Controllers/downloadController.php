<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//include '../vendor/autoload.php';
use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;
use App\Reqhistory;
use Workerman\Worker;
use Illuminate\Support\Facades\Redis;
class downloadController extends Controller
{
   public function download()
    {
       
            $dl = new YoutubeDl([
                'continue' => true,
                'extract-audio' => true,
                'audio-format' => 'mp3',
                'audio-quality' => 0, 
            ]);
        
            $dl->setDownloadPath('../public/converted');
        try {
            $audio = $dl->download($url);  
            
            $id = Redis::incr('id');
            $store = Redis::hmset('id:'.$id,'email',$email,'audio',$audio->get('_filename'));
            $data = array('email'=>Redis::hget('id'.$id,'email'),'audio'=>Redis::hget('id'.$id,'audio'));
           
            $connection->send('success');
       
        } catch (NotFoundException $e) {
            // Video not found
        } catch (PrivateVideoException $e) {
            // Video is private
        } catch (CopyrightException $e) {
            // The YouTube account associated with this video has been terminated due to multiple third-party notifications of copyright infringement
        } catch (\Exception $e) {
        
        }
    
    }

    
}