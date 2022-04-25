<?php 

class Electric extends Pokemon
{

    const MAX_HITPOINT = 100; // 最大HP
    private $hitPoint = self::MAX_HITPOINT; // 現在のHP
    private $attackPoint = 30; //物理攻撃
    private $specialAttack = 40; //特殊攻撃

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->specialAttack);
    }

    public function doAttack($enemies) {

        // チェック1 : 自身のHPが0かどうか
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        // 配列からランダムに敵1体を決定する
        $enemyIndex = rand(0, count($enemies) - 1); // 添え字は0から始まるので, -1する
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 5) === 5) {
            //強力な技の発動
            echo "『" . $this->getName() . "』のかみなり! \n";
            echo "効果はばつぐんだ! \n";
            echo "【 " . $enemy->getName() . " 】に" . $this->specialAttack * 3 . " のダメージ! \n";
            $enemy->tookDamage($this->specialAttack * 3);
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->getName() . "』の電気ショック! \n";
            echo "効果はばつぐんだ! \n";
            echo "【 " . $enemy->getName() . " 】に" . $this->specialAttack * 2 . " のダメージ! \n";
            $enemy->tookDamage($this->specialAttack* 2);
        }  else {
            parent::doAttack($enemies);
        }
        return true;
    }
}
