<?php 

class Pokemon
{
    const MAX_HITPOINT = 100;
    public $name;
    public $hitPoint = 100;
    public $attackPoint = 20;

    public function doAttack($enemy)
    {
        echo "『" . $this->name . "』の体当たり! \n";
        echo "【" . $this->enemy . "】に" . $this->attackPoint . "のダメージ! \n";
        $enemy->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}
















?>