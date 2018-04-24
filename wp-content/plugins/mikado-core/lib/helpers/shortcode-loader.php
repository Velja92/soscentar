<?php

namespace Medigroup\Modules\Shortcodes\Lib;

use Medigroup\Modules\BoxHolder\BoxHolder;
use Medigroup\Modules\CallToAction\CallToAction;
use Medigroup\Modules\Counter\Countdown;
use Medigroup\Modules\Counter\Counter;
use Medigroup\Modules\ElementsHolder\ElementsHolder;
use Medigroup\Modules\ElementsHolderItem\ElementsHolderItem;
use Medigroup\Modules\GoogleMap\GoogleMap;
use Medigroup\Modules\Separator\Separator;
use Medigroup\Modules\PieCharts\PieChartBasic\PieChartBasic;
use Medigroup\Modules\PieCharts\PieChartDoughnut\PieChartDoughnut;
use Medigroup\Modules\PieCharts\PieChartDoughnut\PieChartPie;
use Medigroup\Modules\PieCharts\PieChartWithIcon\PieChartWithIcon;
use Medigroup\Modules\Shortcodes\AnimationsHolder\AnimationsHolder;
use Medigroup\Modules\Shortcodes\BlogSlider\BlogSlider;
use Medigroup\Modules\Shortcodes\ComparisonPricingTables\ComparisonPricingTable;
use Medigroup\Modules\Shortcodes\ComparisonPricingTables\ComparisonPricingTablesHolder;
use Medigroup\Modules\Shortcodes\Icon\Icon;
use Medigroup\Modules\Shortcodes\IconProgressBar;
use Medigroup\Modules\Shortcodes\ImageGallery\ImageGallery;
use Medigroup\Modules\Shortcodes\InfoBox\InfoBox;
use Medigroup\Modules\Shortcodes\Process\ProcessHolder;
use Medigroup\Modules\Shortcodes\Process\ProcessItem;
use Medigroup\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use Medigroup\Modules\Shortcodes\SectionTitle\SectionTitle;
use Medigroup\Modules\Shortcodes\TwitterSlider\TwitterSlider;
use Medigroup\Modules\Shortcodes\VideoBanner\VideoBanner;
use Medigroup\Modules\Shortcodes\WorkingHours\WorkingHours;
use Medigroup\Modules\Shortcodes\TeamSlider\TeamSlider;
use Medigroup\Modules\Shortcodes\TabSlider\TabSlider;
use Medigroup\Modules\Shortcodes\TabSliderItem\TabSliderItem;
use Medigroup\Modules\CoverBoxes\CoverBoxes;
use Medigroup\Modules\CoverBox\CoverBox;
use Medigroup\Modules\CoverBoxDoctor\CoverBoxDoctor;
use Medigroup\Modules\SocialShare\SocialShare;
use Medigroup\Modules\Team\Team;
use Medigroup\Modules\OrderedList\OrderedList;
use Medigroup\Modules\UnorderedList\UnorderedList;
use Medigroup\Modules\Message\Message;
use Medigroup\Modules\ProgressBar\ProgressBar;
use Medigroup\Modules\ProductList\ProductList;
use Medigroup\Modules\IconListItem\IconListItem;
use Medigroup\Modules\Tabs\Tabs;
use Medigroup\Modules\Tab\Tab;
use Medigroup\Modules\PricingTables\PricingTables;
use Medigroup\Modules\PricingTable\PricingTable;
use Medigroup\Modules\Accordion\Accordion;
use Medigroup\Modules\AccordionTab\AccordionTab;
use Medigroup\Modules\InfoList\InfoList;
use Medigroup\Modules\InfoListItem\InfoListItem;
use Medigroup\Modules\BlogList\BlogList;
use Medigroup\Modules\Shortcodes\Button\Button;
use Medigroup\Modules\Blockquote\Blockquote;
use Medigroup\Modules\CustomFont\CustomFont;
use Medigroup\Modules\Highlight\Highlight;
use Medigroup\Modules\VideoButton\VideoButton;
use Medigroup\Modules\Dropcaps\Dropcaps;
use Medigroup\Modules\Shortcodes\IconWithText\IconWithText;
use Medigroup\Modules\MiniTextSlider\MiniTextSlider;
use Medigroup\Modules\MiniTextSliderItem\MiniTextSliderItem;
use Medigroup\Modules\CardSlider\CardSlider;
use Medigroup\Modules\Card\Card;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {
	}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {
	}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 *
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new Team());
		$this->addShortcode(new Icon());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new Message());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new ProductList());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Separator());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new VideoBanner());
		$this->addShortcode(new AnimationsHolder());
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new SectionSubtitle());
		$this->addShortcode(new InfoBox());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
		$this->addShortcode(new ComparisonPricingTablesHolder());
		$this->addShortcode(new ComparisonPricingTable());
		$this->addShortcode(new IconProgressBar());
		$this->addShortcode(new WorkingHours());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new TwitterSlider());
		$this->addShortcode(new MiniTextSlider());
		$this->addShortcode(new MiniTextSliderItem());
		$this->addShortcode(new TeamSlider());
		$this->addShortcode(new TabSlider());
		$this->addShortcode(new TabSliderItem());
		$this->addShortcode(new InfoList());
		$this->addShortcode(new InfoListItem());
		$this->addShortcode(new CoverBoxes());
		$this->addShortcode(new CoverBox());
		$this->addShortcode(new CoverBoxDoctor());
		$this->addShortcode(new CardSlider());
		$this->addShortcode(new Card());
		$this->addShortcode(new BoxHolder());
	}

	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}

	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();