import React from 'react';

import { Link } from "react-router-dom";

const Recipes  = props => (
  <div className="container">
    <div className="row">
    { props.recipes.map((recipe) => {
      return (
        <div key={recipe.strDrink} className="col-md-4" style={{marginBottom:"2rem"}}>
          <div className="recipes__box">
            <img
              className="recipe__box-img"
              src={recipe.strDrinkThumb}
              alt={recipe.strDrink}/>
              <div className="recipe__text">
                <h5 className="recipes__title">
                  { recipe.strDrink.length < 20 ? `${recipe.strDrink}` : `${recipe.strDrink.substring(0, 25)}...` }
                </h5>
                <p className="recipes__subtitle">Publisher: <span>
                  { recipe.publisher } // Date de publication
                </span></p>
              </div>
              <div>
                <Link to={{ pathname: `/recipe/${recipe.strDrink}`,
                            state: { recipe: recipe.strDrink }
              }} className="link link--ersa"><span>View Recipe</span></Link>
              </div>
          </div>
        </div>
      );
    })}
    </div>
  </div>
);

export default Recipes;
