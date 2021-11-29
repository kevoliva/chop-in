import React from 'react';

import { Link } from "react-router-dom";

const Recipes  = props => (
  <div className="container">
    <div className="row">
    { props.recipes.map((recipe) => {
      return (
        <div key={recipe.nom} className="col-md-4" style={{marginBottom:"2rem"}}>
          <div className="recipes__box">
            {/* <img className="recipe__box-img"
              src={recipe.strDrinkThumb}
              alt={recipe.strDrink}/> */}
              <div className="recipe__text">
                <h5 className="recipes__title">
                  { recipe.type.length < 20 ? `${recipe.nom}` : `${recipe.nom.substring(0, 25)}...` }
                </h5>
                <p className="recipes__subtitle">Publisher: <span>
                  { recipe.heureDebut } // Date de publication
                </span></p>
              </div>
              <div>
                <Link to={{ pathname: `/recipe/${recipe.bar}`,
                            state: { recipe: recipe.bar }
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
