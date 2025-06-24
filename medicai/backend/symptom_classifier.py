import pandas as pd
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.preprocessing import LabelEncoder
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense
from sklearn.model_selection import train_test_split
import joblib

df = pd.read_csv("datasets/symptoms_dataset.csv")
df['symptoms'] = df.iloc[:, :-1].apply(lambda x: ' '.join(x.dropna().astype(str)), axis=1)

X = df['symptoms']
y = df['disease']

vectorizer = CountVectorizer()
X_vec = vectorizer.fit_transform(X)

le = LabelEncoder()
y_enc = le.fit_transform(y)

X_train, X_test, y_train, y_test = train_test_split(X_vec, y_enc, test_size=0.2)

model = Sequential([
    Dense(128, activation='relu', input_shape=(X_vec.shape[1],)),
    Dense(64, activation='relu'),
    Dense(len(le.classes_), activation='softmax')
])

model.compile(optimizer='adam', loss='sparse_categorical_crossentropy', metrics=['accuracy'])
model.fit(X_train.toarray(), y_train, epochs=10)

model.save("models/symptom_model.h5")
joblib.dump(vectorizer, "models/vectorizer.pkl")
joblib.dump(le, "models/label_encoder.pkl")