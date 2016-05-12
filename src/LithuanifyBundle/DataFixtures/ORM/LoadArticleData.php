<?php
namespace LithuanifyBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LithuanifyBundle\Entity\Article;
/**
 * Class LoadArticleData
 * @package LithuanifyBundle\DataFixtures\ORM
 */
class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if (($handle = fopen(__DIR__."/articles.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $article = new Article();
                $article->setTitle($data[0]);
                $article->setContent($data[1]);
                $article->setDate(strtotime($data[2]));
                $article->setCountry($manager->getRepository('LithuanifyBundle:Country')->find($data[3]));
                $article->setNewsUrl($data[4]);
                $article->setEventId(null);
                $article->setSourceId(null);
                $manager->persist($article);
                $manager->flush();
            }
            fclose($handle);
        }
    }
    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}

////        $article1 = new Article();
////        $article1->setTitle('IS conflict: Dozens killed in Baghdad car bombings');
////        $article1->setContent('At least 93 people have been killed in three car bomb attacks in the Iraqi capital Baghdad, police and medics say.
////        The deadliest killed 84 people and wounded 87 in a market in the mainly Shia Muslim area of Sadr City.
////        Later two suicide bombers targeted police checkpoints in the northern district of Kadhimiya and in Jamia, in the west, leaving 29 dead.
////        The so-called Islamic State (IS) group claimed the attacks - the worst day of violence in Baghdad so far this year.
////        The Sunni jihadist group, which controls large swathes of northern and western Iraq, has frequently targeted Shia, whom it considers apostates.
////        Islamic State group: The full story
////        IS crisis in seven charts
////        The target of Wednesdays first bombing was the busy market in Sadr City.
////        Police and witnesses said the explosives were hidden under fruit and vegetables loaded on a pick-up trick.');
////        $article1->setNewsUrl("http://www.bbc.com/news/world-middle-east-36265245");
////        $article1->setDate(663724800);
////        $article1->setCountryId(235);
////        $article1->setEventId(null);
////        $article1->setSourceId(null);
////        $manager->persist($article1);
////
////        $article2 = new Article();
////        $article2->setTitle('Why M-Pesa failed in South Africa');
////        $article2->setContent('South Africas largest mobile phone operator Vodacom has announced it will be scrapping its M-Pesa mobile money transfer system in Africas second-biggest economy.
////        For many pundits the move comes as a surprise, because M-Pesa has been a huge success in other African states - especially in Kenya where it was launched in 2007.
////        The service allows people without bank accounts to transfer money quickly, easily and safely using their mobile phones.
////        According to a World Bank report, only 12% of Africans with bank accounts use mobile money services.
////        However, this is not the case in South Africa.
////        Mobile phone usage is high - nine in 10 South Africans own a mobile phone - and a third of these are smartphones, according to figures from the Pew Research Center.
////        Yet South Africa has the most technologically advanced, financially liquid and accessible banking system on the continent.
////        About 75% of adults in the country have bank accounts, a survey done by technology research body FinMark shows.
////        In a statement, Vodacom Chief Executive Shameel Joosub said the success of M-Pesa in South Africa hinged on "achieving a critical mass of users".
////        But Vodacom has struggled to find the customers. That is the problem.
////        Wrong partner?
////        M-Pesa was launched in South Africa in 2010, perhaps with the hope of capturing the energy and excitement of a nation hosting the football World Cup.
////        Trading on its position as the leading mobile operator in the country, Vodacom thought it could build an M-Pesa customer base of 10 million in three years.
////        However, six years on the service only has 76,000 active users in South Africa, although many more have been registered.');
////        $article1->setNewsUrl('http://www.bbc.com/news/world-africa-36260348');
////        $article2->setDate(-1637020800);
////        $article2->setCountryId(235);
////        $article2->setEventId(null);
////        $article2->setSourceId(null);
////        $manager->persist($article2);
////
////        $article3 = new Article();
////        $article3->setTitle('Can Viv help where Siri flounders?');
////        $article3->setContent('Ill be upfront: Ive got a pretty low opinion of Siri, Apples virtual assistant.
////        It may be that it doesnt quite make out my accent - which is a mixture of Cambridgeshire and Londoner - while Googles software manages just fine.
////        It may be that asking it "What is the Cambridge United score?" resulted in search results for the University of Cambridges Wikipedia page.
////        Or it may just be that in the five years since it was built into Apples mobile devices, it hasnt really got close to being a key part of how we work.
////        Some will disagree - but I ask you, if Siri was suddenly removed, would you really miss it?*
////        Turns out the very people who originally created Siri arent too enamoured with its progress, either.
////        When Apple took over the company, Siris creators Dag Kittlaus and Adam Cheyer soon became unhappy.
////        In a revealing Washington Post piece last week, they said their vision didnt "align" with that of Steve Jobs - and there was only ever going to be one winner in that situation.
////        So they left, leaving behind Siri, but taking with them a hope to build on what they knew and create something new. Something better.
////        That product, unveiled today in New York, is Viv. Thats pronounced Viv, like Viv Richards, not Veeve or Vive.
////        The company has dubbed it "The Global Brain", and its secret sauce is tight partnerships with popular services, and a unique way of understanding human queries.');
////        $article1->setNewsUrl('http://www.bbc.com/news/technology-36253428');
////        $article3->setDate(637113600);
////        $article3->setCountryId(235);
////        $article3->setEventId(null);
////        $article3->setSourceId(null);
////        $manager->persist($article3);
