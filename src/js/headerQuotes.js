// QUOTE FUNCTION

$(document).ready(function() {

// Define a quote library
  var quoteSource=[
  {
    quote: "If you want to become a great chef, you have to work with great chefs. And that's exactly what I did.",
    name:"Gordon Ramsay"
    },
    {
      quote:"You can call me the bad boy chef all you want. I'm not going to freak out about it. I'm not that bad. I'm certainly not a boy, and it's been a while since I've been a chef.",
      name:"Anthony Bourdain"
    },
    {
      quote:"It does not matter how slowly you go as long as you do not stop.",
      name:"Confucius"
    },
    {
      quote:"Our greatest weakness lies in giving up. The most certain way to succeed is always to try just one more time.",
      name:"Thomas A. Edison"
    },
    {
      quote:"If you're not the one cooking, stay out of the way and compliment the chef.",
      name:"Michael Strahan"
    },
    {
      quote:"A home cook who relies too much on a recipe is sort of like a pilot who reads the plane’s instruction manual while flying.",
      name:"Alton Brown"
    },
    {
      quote:"First, knife skills. Then, knowing how to control heat. Most important is choosing the right product... the rest is simple.",
      name:"Justin Quek"
    },
    {
      quote:"A creative man is motivated by the desire to achieve, not by the desire to beat others.",
      name:"Ayn Rand"
    },
    {
      quote:"When baking, follow directions. When cooking, go by your own taste",
      name:"Laiko Bahrs"
    },
    {
      quote:"Fish, to taste right, must swim three times – in water, in butter and in wine.",
      name:"Polish proverb"
    },
    {
      quote:"We're hoping to succeed; we're okay with failure. We just don't want to land in between.",
      name:"David Chang"
    },
    {
      quote:"A great restaurant doesn't distinguish itself by how few mistakes it makes but by how well they handle those mistakes.",
      name:"Danny Meyer"
    },
    {
      quote:"Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
      name:"Albert Einstein"
    },
    {
      quote:"When you have made as many mistakes as I have then you can be as good as me.",
      name:"Wolfgang Puck"
    },
    {
      quote:"I would much rather be a chef who remembers I am a cook then a cook that thinks I am a chef.",
      name:"Richard (Ric) Peterson"
    },
    {
      quote:"I love the man that can smile in trouble, that can gather strength from distress, and grow brave by reflection. ’Tis the business of little minds to shrink, but he whose heart is firm, and whose conscience approves his conduct, will pursue his principles unto death.",
      name:"Thomas Paine"
    },
    {
      quote:"Successful people do what unsuccessful people are not willing to do. Don’t wish it were easier, wish you were better.",
      name:"Jim Rohn"
    },
    {
      quote:"Twenty years from now you will be more disappointed by the things that you didn’t do than by the ones you did do, so throw off the bowlines, sail away from safe harbor, catch the trade winds in your sails. Explore, Dream, Discover.",
      name:"Mark Twain"
    },
    {
      quote:"There are two types of people who will tell you that you cannot make a difference in this world: those who are afraid to try and those who are afraid you will succeed.",
      name:"Ray Goforth"
    },
    {
      quote:"There will be obstacles. There will be doubters. There will be mistakes. But with hard work, there are no limits.",
      name:"Michael Phelps"
    },
    {
      quote:"When I was 5 years old, my mother always told me that happiness was the key to life. When I went to school, they asked me what I wanted to be when I grew up. I wrote down “happy”. They told me I didn’t understand the assignment, and I told them they didn’t understand life.",
      name:"John Lennon"
    },
    {
      quote:"Vegetarians, and their Hezbollah-like splinter faction, the vegans ... are the enemy of everything good and decent in the human spirit.",
      name:"Anthony Bourdain"
    },
    {
      quote:"Oh, I'll accomodate them, I'll rummage around for something to feed them, for a 'vegetarian plate', if called on to do so. Fourteen dollars for a few slices of grilled eggplant and zucchini suits my food cost fine.",
      name:"Anthony Bourdain"
    },
    {
      quote:"Few things are more beautiful to me than a bunch of thuggish, heavily tattooed line cooks moving around each other like ballerinas on a busy Saturday night. Seeing two guys who'd just as soon cut each other's throats in their off hours moving in unison with grace and ease can be as uplifting as any chemical stimulant or organized religion.",
      name:"Anthony Bourdain"
    }

  ];

  // Get a new random number based on number of quotes
  var sourceLength = quoteSource.length;
  var randomNumber= Math.floor(Math.random()*sourceLength);

  // Set a new quote
  for(i=0;i<=sourceLength;i+=1){
    var newQuoteText = quoteSource[randomNumber].quote;
    var newQuoteGenius = quoteSource[randomNumber].name;
    var quoteContainer = $('.callout-container');

    quoteContainer.html('');
    quoteContainer.append('<p class="quote">'+newQuoteText+'</p>'+'<p class="author">'+newQuoteGenius+'</p>');
  } //end for loop

}); // END QUOTE FUNCTION
