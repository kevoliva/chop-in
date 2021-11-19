import React from 'react';

import { Link } from "react-router-dom";

class Recipe extends React.Component {
  state = {
    activeRecipe: []
  }

  componentDidMount = async () => {
    const title = this.state.activeRecipe;
    const req = await fetch(`https://www.thecocktaildb.com/api/json/v1/1/search.php?s=${title}`);

    const res = await req.json();
    this.setState({ activeRecipe: res.drinks[0] });
    console.log(this.state.activeRecipe);

  }
  render() {
    const recipe = this.state.activeRecipe;
    return(
      <div className="container">
        { this.state.activeRecipe.length !== 0 &&
          <div className="active-recipe">
            <img className="active-recipe__img" src={recipe.strDrinkThumb} alt={recipe.strDrink} />
            <h3 className="active-recipe__title">{ recipe.strDrink }</h3>
            <h4 className="active-recipe__publisher">
              Publisher: <span>{ recipe.publisher }</span>
            </h4>
            <p className="active-recipe__web">
              Website : <span><a href={recipe.publisher_url}>{recipe.publisher_url}</a></span>
            </p>
            <div>
              <Link to="/" className="link link--ersa"><span>Go Home</span></Link>
            </div>
          </div>
        }
      </div>
    );
  }
};

export default Recipe;
