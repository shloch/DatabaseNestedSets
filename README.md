# Database Nested sets

Storing, Querying binary trees in a relational database and building a REST api from it.
More about the exercise [here](https://github.com/shloch/DatabaseNestedSets/blob/main/Backend%20Developer%20Test%20-%20PHP%20NEW%2010_20.pdf)

## Visual sketch of data representation

![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/sketch.jpeg)

## Project Specs

![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/requirements.jpg)
![alt text](https://github.com/shloch/DatabaseNestedSets/blob/main/images/constraints.jpeg)


## Installations and Setup



- Execute the SQL queries inside `tables.sql` to setup the database and it's tables
- Execute the SQL queries inside `data.sql` to insert data
- clone/download this project and put the folder inside your server hosting folder (`www`, `htdocs` etc..)
- configure your database access inside the file  `config/config.php`
- launch your Webserver and open the project via your favourite browser


## Testing the app

The live demo is available here: _https://rawcdn.githack.com/shloch/custom-Grid-based-Framework/3b4bc04f48eabc1b80066c1eb94c83c2e293246b/index.html_


## Deployed link and Demo videos 

This project is deployed on Heroku for testing and deployed [here](https://nested-sets.herokuapp.com/api.php/)

Sample search string = `https://nested-sets.herokuapp.com/api.php/?node_id=2&language=italian&search=helpdesk&page_size=210&page_num=0`

- [VIDEO 1 - PROJECT PRESENTATION](https://www.loom.com/share/afcc37bddd414dc8b027b6dca27fefba)
- [VIDEO 2 - PROJECT PRESENTATION](https://www.loom.com/share/b2bc3f4fd9334fa1a470e3fc51310b30)


## Code walk-through video

- [VIDEO 3 - HOW THE CODE WORKS](https://www.loom.com/share/a31fa194b9784fbbbd3e99d49f566fd6)

## Contributor

### 👤 **SHEY Louis CHIA**

- Github: [shloch](https://github.com/shloch)
- Twitter: [@shloch](https://twitter.com/shloch)
- Linkedin: [/in/shey-louis-chia](https://www.linkedin.com/in/shey-louis-chia)
- Email: shloch2007@yahoo.fr


## Acknowledgements
- https://www.youtube.com/watch?v=RswtHsz4v-0
- http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/
- https://code.tutsplus.com/tutorials/how-to-paginate-data-with-php--net-2928

