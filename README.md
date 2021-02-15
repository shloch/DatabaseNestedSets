# Database Nested sets

Storing, Querying binary trees in a relational database and building a REST api from it
More about the exercise here

## Visual sketch of data representation

![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/sketch.jpeg)

## Project Specs

![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/requirements.jpeg)
![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/constraints.jpeg)


## USAGE

Our CSS grid framework is in "tailor.scss" file.
It's a framework for building HTML building blocks and it revolves around the figure 12.
That means in a single row, you can build a maximum of 12-summed-calculated, responsive columns. You could also build some blocks with specific widths and the others will take the remaining space.

The basic formula for using the framework is demonstrated below

```HTML
<div class="hbox">
    <div class="ds-4"></div>
    <div class="ds-4"></div>
    <div class="ds-4"><div>
</div>
```
Or

```HTML
<div class="hbox">
    <div class="ds-3"></div>
    <div></div>
    <div class="ds-3"><div>
</div>
```

The first example above is an equal-sized 3-blocks horizontal grid. The class names of the children blocks can be of format "S-X" (S in [ds, xs, sm, md, lg, xl] and 0 < X (integer) < 13) among many others. If the sum of different X exceeds 12 then the exceedings blocks will wrap to the next line or column depending on container type (hbox or vbox). All flex blocks should be wrapped in a parent block with a class either "hbox" or "vbox".
N.B: ds means default-size here. So when building your project you don't have to worry about targetting a specif screen size. You just start with your laptop size and make adjustment for responsiveness after.

The second example gives a 3/12 percentage width of the first and third blocks. So the middle one will take all the available space. It gives the same result of having add "ds-6" class to it.

The framework has been built with media queries in mind for responsiveness with 5 breakpoints denoted by the following short caracters.

xs-X : extra small screens with width under 575px  
sm-X : small screens with width under 768px   
md-X : medium screens with width under 992px  
lg-X : large screens with width under 1200px  
xl-X : extra large screens with width upper 1201px  

All of these conditions include their threshold

X in these scenarios is also in the interval ==> (0 < X < 13) and are integers.

The basic example above can be made responsive on medium and small screens as follows:

```HTML
<div class="hbox">
    <div class="ds-4 md-6 sm-12"></div>
    <div class="ds-4 md-5 sm-12"></div>
    <div class="ds-4 md-6 sm-12"><div>
</div>
```

Explanation : From the above example, we have 3 equally split blocks placed horizontally to each other on a single row as default(ds-X).

- As we move to medium screens, like tablets (md-X), the block size moves to 6 (being half of 12, that makes 50%). Therefore, we shall have two blocks placed next to each other on row one and a third lonely block on row two occupying 50% of the row.
- As we move towards small screens (sm-X), we will have these 3 blocks, each on a separate row and each occupying fully the row width.

Additionally, you can also remove blocks you wish at particular breakpoints by using the following self-explanatory classes.

xs-none : hide blocks at extra small screens  
sm-none : hide blocks at small screens  
md-none : hide blocks at medium screens  
lg-none : hide blocks at large screens  
xl-none : hide blocks at extra large screens  

and make them reappear as flex item by changing "none" to "flex".

EXAMPLE :

```HTML
<div class="hbox">
    <div class="ds-8 sm-12"></div>
    <div class="ds-4 sm-none xs-flex"></div>
</div>
```

From example above, the second block is removed (display: none) at small screens and reappear at extra small screens.


## Some Illustrations

The live demo is available here: _https://rawcdn.githack.com/shloch/custom-Grid-based-Framework/3b4bc04f48eabc1b80066c1eb94c83c2e293246b/index.html_


## Screenshot 




![alt text](https://github.com/shloch/custom-Grid-based-Framework/blob/master/assets/images/screenshot2.png)

![alt text](https://github.com/shloch/custom-Grid-based-Framework/blob/master/assets/images/design.gif)

## Contributors

### 👤 **SHEY Louis CHIA**

- Github: [shloch](https://github.com/shloch)
- Twitter: [@shloch](https://twitter.com/shloch)
- Linkedin: [/in/shey-louis-chia](https://www.linkedin.com/in/shey-louis-chia)
- Email: shloch2007@yahoo.fr


## Acknowledgements
- https://www.youtube.com/watch?v=RswtHsz4v-0
- http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/

