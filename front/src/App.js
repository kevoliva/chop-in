import React, { Component } from 'react';
import './App.css';
import Form from "./components/Form";
import Recipes from "./components/Recipes";
import Navbar from './components/Navbar';
import Header from './components/Header';

class App extends Component {
  state = {
    recipes: []
  }

  getRecipe = async (e) => {
    const eventName = e.target.elements.eventName.value;
    e.preventDefault();

    const api_call = await fetch(`https://www.thecocktaildb.com/api/json/v1/1/search.php?s=${eventName}`);
    const data = await api_call.json();
    this.setState({ recipes: data.drinks});
    console.log(this.state.recipes);
  }

  componentDidMount = () => {
    const json = localStorage.getItem("recipes");
    const recipes = JSON.parse(json);
    this.setState({ recipes: recipes });
  }

  componentDidMount = () => {
    const recipes = JSON.stringify(this.state.recipes);
    localStorage.setItem("recipes", recipes);
  }

  render() {
    return (
      <div className="App">
        <Header />
        <Navbar />
        <div className="content">
          <Form getRecipe={this.getRecipe} />
          <Recipes recipes={this.state.recipes} />
        </div>

      </div>
    );
  }

}

export default App;
