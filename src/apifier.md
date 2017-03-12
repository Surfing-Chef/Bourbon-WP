#Apifier crawlers  
> A repository of crawlers that work to crawl various groups of sites

##Newest Culinaria
> The most recent working crawl as of <date> that returns:  
  > *base*  
  > *topic*  
  > *title *  
  > *linkUrl*   
  > *imageUrl*

```javascript
function pageFunction(context) {
    // called on every page the crawler visits, use it to extract data from it
    var $ = context.jQuery;

    // Saveur
    var results0 = [];
    $('.field-page-sections h2').siblings('.cell').find('.field-item').slice(0,5).each(function(){
      results0.push({
          base: $(':root').find('meta[property="og:url"]').attr('content').trim().substring(0,21),
          topic: $(this).find('.field-title a').text(),
          title: $(this).find('.field-title a').text(),
          linkUrl: $(this).find('a').attr('href'),
          imageUrl: $(this).find('.field-image a img').attr('data-src')
      });
    });

    // Food and Wine
    var results1 = [];
    $('.story-card').slice(0,5).each(function(){
      results1.push({
          base: $(':root').find('meta[property="og:url"]').attr('content').trim().substring(0,26),
          topic: $(this).find('.story-card__title').text().trim(),
          title: $(this).find('.story-card__title').text().trim(),
          linkUrl: $(this).find('.story-card__link').attr('href'),
          imageUrl: $(this).find('.story-card__img-wrap source').attr('data-srcset')
      });
    });

    // Food52
    var results2 = [];
    $('.home-grid').find('.home-tile').slice(0,5).each(function(){
      results2.push({
          base: $(':root').find('meta[property="og:url"]').attr('content').trim().substring(0,18),
          topic: $(this).find('img').attr('data-pin-description').trim().slice(0, -10),
          title: $(this).find('img').attr('data-pin-description').trim().slice(0, -10),
          linkUrl: $(this).find('a').attr('href'),
          imageUrl: $(this).find('img').attr('data-pin-media')  
      });
    });

    // Lucky Peach
    var results3 = [];
    $('.archive-list--item').slice(1,6).each(function(){
      results3.push({
          base: $(':root').find('meta[property="og:url"]').attr('content').trim().substring(0,21),
          title: $(this).find('.entry-title h2 a').text().trim(),
          topic: $(this).find('.archive-list--excerpt p').text().trim(),
          linkUrl: $(this).find('.entry-title h2 a').attr('href'),
          imageUrl: $(this).find('.archive-list--img img').attr('src')
      });
    });

    // Cooks Illustrated
    var results4 = [];
    $('.browse-results .result').slice(0,5).each(function(){
      results4.push({
        base: "https://www.cooksillustrated.com",
        topic: "Latest Recipes",
        title: $(this).find('.result__image-link').attr('title'),
        linkUrl: $(this).find('.result__image-link').attr('href'),
        imageUrl: $(this).find('.result-image-container__img').attr('src')
      });
    });

    return [results0, results1, results2, results3, results4];

}
```
##National Geographic Food
> The most recent working crawl as of <date> that returns:  
  > *base*  
  > *topic*  
  > *title *  
  > *linkUrl*   
  > *imageUrl*

```javascript
// NatGeoFood
var results = [];
$('.multi-layout-promos__promo-content').slice(1,6).each(function(){
  results.push({
    base: "http://www.nationalgeographic.com/people-and-culture/food/",
    topic: $(this).find('.multi-layout-promos__promo-series').text().trim(),
    title: $(this).find('.multi-layout-promos__promo-title a span').text().trim(),
    excerpt: $(this).find('.multi-layout-promos__promo-dek span').text().trim(),
    linkUrl: $(this).find('.multi-layout-promos__promo-title a').attr('href'),
    imageUrl: $(this).find('a img').attr('src')
  });
});

return results;
```

##Seriouseats
```javascript
function pageFunction(context) {
    // called on every page the crawler visits, use it to extract data from it
    var $ = context.jQuery;

    var results = [];
    // selects first 6 sections, discards the third
    $('section.block:not(:eq(2)) .block__wrapper').slice(1,7).each(function(){
      results.push({
        base: "http://www.seriouseats.com/",
        topic: $(this).find('.module:first-child .metadata .category-link').text().trim(),
        title: $(this).find('.module:first-child .metadata .module__link .title').text().trim(),
        linkUrl: $(this).find('.module:first-child .metadata .module__link').attr('href').trim(),
        imageUrl: $(this).find('.module:first-child .module__link .module__image').attr('data-src').trim()
      });
    });

    return results;
}
```

##Cooks Illustrated
```javascript
function pageFunction(context) {
    // called on every page the crawler visits, use it to extract data from it
    var $ = context.jQuery;

    var results = [];

    $('.browse-results .result').slice(0,5).each(function(){
      results.push({
        base: "https://www.cooksillustrated.com",
        topic: "Latest Recipes",
        title: $(this).find('.result__image-link').attr('title'),
        linkUrl: $(this).find('.result__image-link').attr('href'),
        imageUrl: $(this).find('.result-image-container__img').attr('src')
      });
    });

    return results;
}
```
