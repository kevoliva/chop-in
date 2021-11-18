import './App.css';
import Navbar from './components/Navbar';
import Header from './components/Header';
import Login from './components/Login';


function App() {
  return (
    <div className="App">
      <Header />
      <Navbar />
      <div className="content">
        <Login trigger={false} />
      </div>

    </div>
  );
}

export default App;
