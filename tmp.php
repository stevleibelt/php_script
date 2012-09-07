<?php
include_once( '../soap.inc.php');
ini_set("soap.wsdl_cache_enabled",1);

Class SinglesTopFlopService extends SinglesService
{
    private function getBooleanToData( $param )
    {
        return ( $param == true ? 'Y':'N');
    }

    /**
    *
    * @return boolean
    *
    **/
    public function isServiceAvailable()
    {
        return true;
    }

    /**
    * @param long
    * @param boolean
    * @return TopFlopProfileEssentials
    * @throws DataNotFoundException
    **/
    public function getProfileEssentialsByCid( $cid, $setOnline = false )
    {
        //mail("martin.korab@freenet-ag.de","WSDL Anfrage Forum getProfileEssentialsByCid","\n".$cid."\n\n".var_export($_SERVER,true));
        $cid = intval( $cid );
        if( $cid == 0)
        {
            //mail("martin.korab@freenet-ag.de","WaSDL Anfrage","\n DataNotFoundException");
            return new DataNotFoundException( '-1','DataNotFoundException','profile not found'  );
            //throw new DataNotFoundException( 'profile not found', -1 );
        }
        $user = new User( 0 );
        $user->setCid( $cid );
        if( $setOnline == false )
        {
            $user->fillByCid( $cid );
            if( $user->getProfile_id() > 0 )
            {
                $pe = new TopFlopProfileEssentials( $user );
                //mail("martin.korab@freenet-ag.de","WSDL Anfrage TopFlop getProfileEssentialsByCid False","\n".$cid."\n\n".var_export($pe,true));
                return $pe;
            }
            else
            {
                return new DataNotFoundException( '-1','DataNotFoundException','profile not found'  );
                //throw new DataNotFoundException( 'profile not found', -1 );
                return false;
            }
        }
        if( $user->is_online() == true )
        {

        }
        else
        {
            $user = new User( 0 );
            $user->fillByCid( $cid );
            if( $user->getProfile_id() > 0 )
            {
                $this->updateLastloginDate( $user->getProfile_id() );
                $odbs = new OnlineDDSynchronizer( $user->getProfile_id() );
                if( !$odbs->setOnline() )
                {
                    return new Exception( 'setOnline failed', -1 );
                    //throw new Exception( 'setOnline failed', -1 );
                    return false;
                }
            }
            else
            {
                return new DataNotFoundException( '-1','DataNotFoundException','profile not found'  );
                //throw new DataNotFoundException( 'profile not found', -1 );
                return false;
            }
        }
        $pe = new TopFlopProfileEssentials( $user );
        mail("martin.korab@freenet.ag","WSDL Anfrage TopFlop getProfileEssentialsByCid true ","\n".$cid."\n\n".var_export($pe,true));
        return $pe;
    }
}
$singlesProfileService = new SinglesTopFlopService( "http://aps.sc.freenet.de",
                                                    "webservice",
                                                    array(  'uri' => '/manage/soap/topflop/',
                                                            'encoding'=>SOAP_ENCODED )
                                                    );
$singlesProfileService->handle();
?>