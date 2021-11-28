import React from 'react';

const Form = props => (
  <form onSubmit={props.getRecipe} style={{ marginBottom:"2rem" }}>
    <input className="form__input" type="text" name="eventName"/>
    <button className="button button--bestia"><div className="button__bg"></div><span>Rechercher</span></button>
  </form>
);


export default Form;
