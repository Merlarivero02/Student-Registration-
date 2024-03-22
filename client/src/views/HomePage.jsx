import axios from 'axios'
import Button from '@mui/material/Button';
function HomePage() {
    axios({
        url: "http://localhost:8000/api/product",
        method: "DELETE"
    }).then(res => {
        console.log(res)
    })
    return (
        <div className="App">
            <h1>Hello World</h1>
            <button>Click Me</button>
            <Button variant="contained">Click Me from MUI</Button>
            <a href="login">Login</a>
        </div>
    )

}

export default HomePage;