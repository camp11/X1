<?php
/*
pyupyu
*/

require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');

$channelAccessToken = 'Zy6ATeIxvaym27SXYOippxT7A9+1QiMHRt2N1ZTWNyKihbiUG9G8t8I0GUnnh0C9EAPCyi0D/dUx3DlwAum3YJRLf5/CyMHwWhm2fMVLqdTNWZd5DT1v1zVc6LrdkgDh6RYQ3fqRIj++rtA/HdHm9QdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '66c479621f6687f326879acf7aad9dce';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$type 		= $client->parseEvents()[0]['type'];

$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];

$profil = $client->profil($userId);

$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function]-------------------------#
function ytdownload($keyword) {
    $uri = "http://wahidganteng.ga/process/api/0470be5f700802ef5bc1db694e61d720/youtube-downloader?url=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "Judul : \n";
	$result .= $json['title'];
	$result .= "\nType : ";
	$result .= $json['data']['type'];
	$result .= "\nUkuran : ";
	$result .= $json['data']['size'];
	$result .= "\nLink : ";
	$result .= $json['data']['link'];
    return $result;
}
#-------------------------[Function]-------------------------#
function music($keyword) { 
    $uri = "http://ide.fdlrcn.com/workspace/yumi-apis/joox?songname=" . $keyword . ""; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
    $result = "====[Music]====";
    $result .= "\nJudul : ";
    $result .= $json['0']['0'];
    $result .= "\nDurasi : ";
    $result .= $json['0']['1'];
    $result .= "\nLink : ";
    $result .= $json['0']['4'];
    $result .= "\n\nPencarian : Google";
    $result .= "\n====[Music]====";
    return $result; 
}
#-------------------------[Function]-------------------------#
function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[JadwalShalat]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nTanggal : ";
	$result .= $json['time']['date'];
	$result .= "\n\nShubuh : ";
	$result .= $json['data']['Fajr'];
	$result .= "\nDzuhur : ";
	$result .= $json['data']['Dhuhr'];
	$result .= "\nAshar : ";
	$result .= $json['data']['Asr'];
	$result .= "\nMaghrib : ";
	$result .= $json['data']['Maghrib'];
	$result .= "\nIsya : ";
	$result .= $json['data']['Isha'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n====[JadwalShalat]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function kalender($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[Kalender]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nTanggal : ";
	$result .= $json['time']['date'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n====[Kalender]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function waktu($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[Time]====";
    $result .= "\nLokasi : ";
	$result .= $json['location']['address'];
	$result .= "\nJam : ";
	$result .= $json['time']['time'];
	$result .= "\nSunrise : ";
	$result .= $json['debug']['sunrise'];
	$result .= "\nSunset : ";
	$result .= $json['debug']['sunset'];
	$result .= "\n\nPencarian : Google";
	$result .= "\n====[Time]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function saveitoffline($keyword) {
    $uri = "https://www.saveitoffline.com/process/?url=" . $keyword . '&type=json';

    $response = Unirest\Request::get("$uri");


    $json = json_decode($response->raw_body, true);
	$result = "====[SaveOffline]====\n";
	$result .= "Judul : \n";
	$result .= $json['title'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][0]['label'];
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][0]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][1]['label'];
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][1]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][2]['label'];	
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][2]['id'];
	$result .= "\n\nUkuran : \n";
	$result .= $json['urls'][3]['label'];	
	$result .= "\n\nURL Download : \n";
	$result .= $json['urls'][3]['id'];	
	$result .= "\n\nPencarian : Google\n";
	$result .= "====[SaveOffline]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function qibla($keyword) { 
    $uri = "https://time.siswadi.com/qibla/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result .= $json['data']['image'];
    return $result; 
}
// ----- LOCATION BY FIDHO -----
function lokasi($keyword) { 
    $uri = "https://time.siswadi.com/pray/" . $keyword; 
 
    $response = Unirest\Request::get("$uri"); 
 
    $json = json_decode($response->raw_body, true); 
 $result['address'] .= $json['location']['address'];
 $result['latitude'] .= $json['location']['latitude'];
 $result['longitude'] .= $json['location']['longitude'];
    return $result; 
}

#-------------------------[Function]-------------------------#
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e172c2f3a3c620591582ab5242e0e6c4";
    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = "====[InfoCuaca]====";
    $result .= "\nKota : ";
	$result .= $json['name'];
	$result .= "\nCuaca : ";
	$result .= $json['weather']['0']['main'];
	$result .= "\nDeskripsi : ";
	$result .= $json['weather']['0']['description'];
	$result .= "\n\nPencariaan : Google";
	$result .= "\n====[InfoCuaca]====";
    return $result;
}
#-------------------------[Function]-------------------------#
function urb_dict($keyword) {
    $uri = "http://api.urbandictionary.com/v0/define?term=" . $keyword;

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $result = $json['list'][0]['definition'];
    $result .= "\n\nExamples : \n";
    $result .= $json['list'][0]['example'];
    return $result;
}
#-------------------------[Function]-------------------------#
function qrcode($keyword) {
    $uri = "http://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=" . $keyword;

    return $uri;
}
#-------------------------[Function]-------------------------#
//show menu, saat join dan command,menu
if ($type == 'join' || $command == 'Help') {
    $text .= "==[EDS BOT-keywords]==";
    $text .= "> \n";
    $text .= "> welcome\n"; 
    $text .= "> Eds\n";
    $text .= "> Official\n";
    $text .= "> Admin\n";
    $text .= "> /shalat [namakota]\n";
    $text .= "> /kalender [namakota]\n";
    $text .= "> /qiblat [namakota]\n";
    $text .= "> /convert [link yt] ->download lagu\n";
    $text .= "> /myinfo\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Function]-------------------------#
//show menu, saat join dan command,menu
if ($type == 'join' || $command == 'Wc') {
    $text .= "====[HALLO WELCOME]====";
    $text .= " \n";
    $text .= "     Selamat datang diROOM\n";
    $text .= "=======================\n";	
    $text .= "           EDS\n";	
    $text .= " ----------------------\n";	
    $text .= "   Expresi Dunia Smule\n";
    $text .= "=======================\n";	
    $text .= "  Jangan Lupa Cek Note ya\n";
    $text .= "[Salken dari Saya]->$profil->displayName\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
if($message['type']=='text') {
	    if ($command == '/qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/myinfo') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '====[InfoProfile]====
Nama: '.$profil->displayName.'

Status: '.$profil->statusMessage.'

Picture: '.$profil->pictureUrl.'

====[InfoProfile]===='
									)
							)
						);
				
	}
}
//pesan bergambar
if ($message['type'] == 'text') {
    if ($command == '/def') {


        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Definition : ' . urb_dict($options)
                )
            )
        );
    }
}
if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'apakah') {
        $balas = send(jawabs(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'bisakah') {
        $balas = send(bisa(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'kapankah') {
        $balas = send(kapan(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'rate') {
        $balas = send(dosa(), $replyToken);
    } else {}
} if($msg_type == 'text'){
    $pesan_datang = strtolower($message['text']);
    $filter = explode(' ', $pesan_datang);
    if($filter[0] == 'dosanya') {
		$balas = send(dosa2(), $replyToken);
		$balas = send(dosa(), $replyToken);
		$balas = send(dosa3(), $replyToken);
    } else {}
} else {}
//translate//
if($message['type']=='text') {
	    if ($command == '/tr-ar') {

        $result = trar($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/tr-ja') {

        $result = trja($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/tr-id') {

        $result = trid($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/tr-en') {

        $result = tren($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/say') {

        $result = say($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/yt-get') {

        $result = yt-download($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => yt-download($options)
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/github-repo') {

        $result = githubrepo($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/cuaca') {

        $result = cuaca($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/qr') {

        $result = qrcode($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $qrcode($options),
                    'previewImageUrl' => qrcode($options)
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/playstore') {

        $result = ps($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => 'Searching...'
                ),
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }

}
if($message['type']=='text') {
	    if ($command == '/quotes') {

        $result = quotes($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text'  => $result
                )
            )
        );
    }

}                
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/convert') {
        $result = saveitoffline($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => saveitoffline($options)
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/shorten') {
        $result = adfly($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $data
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/qiblat') {
        $hasil = qibla($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $hasil,
                    'previewImageUrl' => $hasil
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ($command == '/yt') {
        $keyword = '';
        $image = 'https://img.youtube.com/vi/' . $keyword . '/2.jpg';
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'image',
                    'originalContentUrl' => $image,
                    'previewImageUrl' => $image
                ), array(
                    'type' => 'video',
                    'originalContentUrl' => vid_search($keyword),
                    'previewImageUrl' => $image
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/lirik') {

        $result = lirik($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//pesan bergambar
// ----- LOKASI BY FIDHO -----
if($message['type']=='text') {
	    if ($command == '/lokasi' || $command == '/Lokasi') {

        $result = lokasi($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'location',
                    'title' => 'Lokasi',
                    'address' => $result['address'],
                    'latitude' => $result['latitude'],
                    'longitude' => $result['longitude']
                ),
            )
        );
    }

}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/kalender') {

        $result = kalender($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if($message['type']=='text') {
	    if ('Apakah' == $command) {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $acak
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/time') {

        $result = waktu($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/music') {

        $result = music($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/zodiak') {

        $result = zodiak($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Bot' || $command == 'bot' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => ' kenapa manggil manggil??'.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Bot' || $command == 'bot' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Ada apa sebut saya??'.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Pagi' || $command == 'pagi' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Pagi juga Sobat EDS, Senyum ya! '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Siang' || $command == 'siang' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Siang juga, Jangan lupa makan siang ya '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Assalamualaikum' || $command == 'assalamualaikum' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'waalaikumsalam wr.wb '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Waalaikumsalam' || $command == 'Waalaikumsalam wr.wb' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Makasih dah jawab salamnya kk '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Sore' || $command == 'sore' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Ngopi dulu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Malam' || $command == 'Night' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Malam juga, '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'baik' || $command == 'Baik' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Tetap Semangat Ya! '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Halo' || $command == 'Hallo' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'HALLO apa kabar'.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Hai' || $command == 'hai' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Hai juga '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Udh' || $command == 'udh' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Udah' || $command == 'udah' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Ok' || $command == 'ok' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'gila' || $command == 'peak' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Kok gitu ngomongnya ;( '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text')
	if ($command == 'admin' || $command == 'Admin' )
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'FIS MANAGEMENT',
  'template' => 
  array (
    'type' => 'carousel',
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/gDpnMb/20180108_110257.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'FOUNDER',
        'text' => 'Group Owner -- Name : FahreziLee   Location : Malaysia',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_Lee',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_FahreziLee',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_LEE',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/gUFu1b/20180108_110910.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'SECRETARY',
        'text' => 'Admin -- Name : DeeAna       Location : Borneo',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_DEE',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_Dee',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_Dee',
          ),
        ),
      ),
      2 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/njD3uw/20180108_111546.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'CREATIVE',
        'text' => 'Admin -- Name : ALS                 Location : West Java',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_ALS',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_ALS',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_ALS',
          ),
        ),
      ),
      3 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/nxZySG/20180108_111027.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'RESOURCE',
        'text' => 'Admin -- Name : Lala              Location : Hongkong',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_LALA',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_LALA',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_LALA',
          ),
        ),
      ),
      4 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/gRYKZw/20180108_111446.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'HOME AS.',
        'text' => 'Admin -- Name : Alfariz              Location : Jakarta',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_ALFARIZ',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_Alfariz',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_Alfariz',
          ),
        ),
      ),
      5 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/npK41b/20180108_111333.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'HOME AS.',
        'text' => 'Admin -- Name : Juna Hermanza   Location : West Java',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_JUNA',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_Juna',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_Juna',
          ),
        ),
      ),
      6 => 
      array (
        'thumbnailImageUrl' => 'https://preview.ibb.co/edtxMb/20180108_111247.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'HOME AS.',
        'text' => 'Admin -- Name : Anissa              Location : West Java',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'CHAT',
            'uri' => 'http://tiny.cc/FIS_NISA',
          ),
          1 => 
          array (
            'type' => 'uri',
            'label' => 'SMULE',
            'uri' => 'https://www.smule.com/FIS_Nisa',
          ),		  
          2 => 
          array (
            'type' => 'message',
            'label' => 'view detail',
            'text' => 'FIS_Nisa',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
  ),
)
							)
						);
				
	}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Welcome' || $command == 'wc' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'imagemap',
  'baseUrl' => 'https://res.cloudinary.com/eds0101/image/upload/v1526813704/WELCOME',
  'altText' => 'WELCOME Di ROOM EDS',
  'baseSize' => 
  array (
    'height' => 1040,
    'width' => 1040,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'uri',
      'linkUri' => 'https://www.smule.com/FIS_OFFICIAL',
      'area' => 
      array (
        'x' => 520,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Eds' || $command == 'EDS' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'imagemap',
  'baseUrl' => 'https://res.cloudinary.com/eds0101/image/upload/v1526813794/LOGO1',
  'altText' => 'EXPRESI DUNIA SMULE',
  'baseSize' => 
  array (
    'height' => 1040,
    'width' => 1040,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'uri',
      'linkUri' => 'https://www.smule.com/FIS_OFFICIAL',
      'area' => 
      array (
        'x' => 520,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'OFFICIAL' || $command == 'Official' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'imagemap',
  'baseUrl' => 'https://res.cloudinary.com/eds0101/image/upload/v1526814038/LOGO2',
  'altText' => 'EXPRESI DUNIA SMULE',
  'baseSize' => 
  array (
    'height' => 1040,
    'width' => 1040,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'uri',
      'linkUri' => 'https://www.smule.com/FIS_OFFICIAL',
      'area' => 
      array (
        'x' => 520,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Judges' || $command == 'judges' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'template',
  'altText' => 'JUDGES EVENT FIS',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/tes5566/image/upload/v1525180249/line/EVENT/crew/lee.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'http://smule.com/FIS_FahreziLee',
        ),
      ),
      1 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/tes5566/image/upload/v1525180266/line/EVENT/crew/chika.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'http://smule.com/FIS_ChikaLee',
        ),
      ),
      2 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/tes5566/image/upload/v1525180286/line/EVENT/crew/dewa.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'http://smule.com/FIS_DewaBF5_HIVO',
        ),
      ),
      3 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/tes5566/image/upload/v1525180245/line/EVENT/crew/uni.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'http://smule.com/HYT_FIS_FOrTe__',
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == '/shalat') {

        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();

    file_put_contents('./balasan.json', $result);


    $client->replyMessage($balas);
}
?>
