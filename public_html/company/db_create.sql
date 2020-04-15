CREATE TABLE IF NOT EXISTS Users (
  id int NOT NULL AUTO_INCREMENT,
  firstname varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  address varchar(255) NOT NULL,
  homephone int NOT NULL,
  cellphone int NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Products (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  display_name varchar(255) NOT NULL,
  description text,
  price DECIMAL NOT NULL,
  image text NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'darklord_morningstar',
  'Darklord Morningstar',
  'Cannot be Special Summoned. If this card is Tribute Summoned: You can Special Summon "Darklord" monsters from your hand and/or Deck, up to the number of Effect Monsters your opponent controls. While you control another "Darklord" monster, your opponent cannot target this card with card effects. Once per turn: You can send cards from the top of your Deck to the Graveyard, equal to the number of "Darklord" monsters on the field, and if you do, gain 500 LP for each "Darklord" card sent to the Graveyard by this effect.',
  15,
  'https://vignette.wikia.nocookie.net/yugioh/images/5/53/DarklordMorningstar-DESO-EN-ScR-1E.png/revision/latest/scale-to-width-down/300?cb=20161117191828'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'blue-eyes_white_dragon',
  'Blue-eyes White Dragon',
  'This legendary dragon is a powerful engine of destruction. Virtually invincible, very few have faced this awesome creature and lived to tell the tale.',
  15,
  'https://vignette.wikia.nocookie.net/yugioh/images/b/bf/BlueEyesWhiteDragon-SS02-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20190128200101'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'blue-eyes_ultimate_dragon',
  'Blue-eyes Ultimate Dragon',
  '"Blue-Eyes White Dragon" + "Blue-Eyes White Dragon" + "Blue-Eyes White Dragon"',
  25,
  "https://vignette.wikia.nocookie.net/yugioh/images/2/20/BlueEyesUltimateDragon-SBLS-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20190509215659"
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'black_luster_soldier-envoy_of_the_beginning',
  'Black Luster Soldier - Envoy of the Beginning',
  'Cannot be Normal Summoned/Set. Must first be Special Summoned (from your hand) by banishing 1 LIGHT and 1 DARK monster from your Graveyard. Once per turn, you can activate 1 of these effects. ● Target 1 monster on the field; banish that target face-up. This card cannot attack the turn this effect is activated.
● If this attacking card destroys an opponent\'s monster by battle, after damage calculation: It can make a second attack in a row.',
  15,
  'https://vignette.wikia.nocookie.net/yugioh/images/3/3b/BlackLusterSoldierEnvoyoftheBeginning-DUSA-EN-UR-1E.png/revision/latest/scale-to-width-down/300?cb=20181028170629'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'one_for_one',
  'One For One',
  'Send 1 monster from your hand to the Graveyard; Special Summon 1 Level 1 monster from your hand or Deck.',
  5,
  'https://vignette.wikia.nocookie.net/yugioh/images/5/59/OneforOne-SDPD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20170118212521'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'mine_golem',
  'Mine Golem',
  'When this card is destroyed by battle and sent to the Graveyard, inflict 500 damage to your opponent.',
  5,
  'https://vignette.wikia.nocookie.net/yugioh/images/9/93/MineGolem-DR3-EN-C-UE.png/revision/latest/scale-to-width-down/300?cb=20160623231105'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'summoned_skull',
  'Summoned Skull',
  'A fiend with dark powers for confusing the enemy. Among the Fiend-Type monsters, this monster boasts considerable force.

(This card is always treated as an "Archfiend" card.)',
  12,
  'https://vignette.wikia.nocookie.net/yugioh/images/7/7f/SummonedSkull-MIL1-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20160415071354'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'copycat',
  'Copycat',
  'If this card is Summoned: Target 1 face-up monster your opponent controls; this card\'s ATK/DEF become equal to that monster\'s original ATK/DEF.',
  5,
  'https://vignette.wikia.nocookie.net/yugioh/images/2/26/Copycat-SS02-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20190128200200'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'monster_reborn_reborn',
  'Monster Reborn Reborn',
  'Target 3 monsters in your GY; your opponent chooses 1, you Special Summon it, and if you do, banish the rest. You can only activate 1 "Monster Reborn Reborn" per turn.',
  5,
  'https://vignette.wikia.nocookie.net/yugioh/images/5/54/MonsterRebornReborn-FLOD-EN-C-1E.png/revision/latest/scale-to-width-down/300?cb=20180504161811'
);

INSERT INTO Products (name, display_name, description, price, image) VALUES(
  'dark_general_freed',
  'Dark General Freed',
  'Cannot be Special Summoned. Negate any Spell effects that target a face-up DARK monster(s) you control and if you do, destroy that Spell Card. During your Draw Phase, instead of conducting your normal draw: You can add 1 Level 4 DARK monster from your Deck to your hand. This card must be face-up on the field to activate and to resolve this effect.',
  8,
  'https://vignette.wikia.nocookie.net/yugioh/images/0/00/DarkGeneralFreed-LCYW-EN-C-1E.jpg/revision/latest/scale-to-width-down/300?cb=20121011220452'
);