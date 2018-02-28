<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.09.2017
 * Time: 12:39
 */

namespace egor260890\sort;

use Prophecy\Exception\Doubler\MethodNotFoundException;
use yii2tech\ar\position\PositionBehavior;

trait Sort
{
    private function attach(){
        $this->attachBehavior('positionBehavior',[
            'class' => PositionBehavior::class,
            'positionAttribute' => $this->getSortAttribute(),
            'groupAttributes'=>$this->getSortGroupAttributes()
        ]);
    }

    public function move(string $position)
    {
        $this->attach();
        $methodName='move'.ucfirst($position);
        call_user_func(function () use ($methodName){
           if (is_callable([$this,$methodName])) {
               return $this->$methodName();
           }else{
               throw new MethodNotFoundException('method not found',self::class,$methodName);
           }
        });
    }

  

    protected abstract function getSortAttribute():string ;
    
    protected abstract function getSortGroupAttributes():array ;

}