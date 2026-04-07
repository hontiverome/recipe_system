const API_BASE_URL = '/api';

const api = {
  async getRecipes() {
    try {
      console.log(`API: Fetching all recipes from ${`${API_BASE_URL}/recipes`}`);
      const response = await fetch(`${API_BASE_URL}/recipes`);
      console.log(`API: Response status: ${response.status}`);
      if (!response.ok) throw new Error(`HTTP ${response.status}: ${response.statusText}`);
      const data = await response.json();
      console.log(`API: Recipes data received:`, data);
      return data;
    } catch (error) {
      console.error('Error fetching recipes:', error);
      throw error;
    }
  },

  async getRecipe(id) {
    try {
      console.log(`API: Fetching recipe ${id} from ${`${API_BASE_URL}/recipes/${id}`}`);
      const response = await fetch(`${API_BASE_URL}/recipes/${id}`);
      console.log(`API: Response status: ${response.status}`);
      if (!response.ok) throw new Error(`HTTP ${response.status}: ${response.statusText}`);
      const data = await response.json();
      console.log(`API: Recipe data received:`, data);
      return data;
    } catch (error) {
      console.error(`Error fetching recipe ${id}:`, error);
      throw error;
    }
  },

  async createRecipe(data) {
    try {
      const response = await fetch(`${API_BASE_URL}/recipes`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      if (!response.ok) throw new Error('Failed to create recipe');
      return await response.json();
    } catch (error) {
      console.error('Error creating recipe:', error);
      throw error;
    }
  },

  async updateRecipe(id, data) {
    try {
      const response = await fetch(`${API_BASE_URL}/recipes/${id}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      });
      if (!response.ok) throw new Error(`Failed to update recipe ${id}`);
      return await response.json();
    } catch (error) {
      console.error(`Error updating recipe ${id}:`, error);
      throw error;
    }
  },

  async deleteRecipe(id) {
    try {
      const response = await fetch(`${API_BASE_URL}/recipes/${id}`, {
        method: 'DELETE',
      });
      if (!response.ok) throw new Error(`Failed to delete recipe ${id}`);
      return response.status === 204 ? null : await response.json();
    } catch (error) {
      console.error(`Error deleting recipe ${id}:`, error);
      throw error;
    }
  },
};

export default api;
